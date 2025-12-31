<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\EventTeam;
use App\Models\EventParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EventRegistrationController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'guardian_name' => 'required|string|max:255',
            'guardian_email' => 'required|email',
            'guardian_phone' => 'required|string',
            'teams' => 'required|array|min:1',
            'teams.*.participants' => 'required|array|min:1',
            'teams.*.participants.*.name' => 'required|string|max:255',
            'teams.*.participants.*.email' => 'nullable|email',
            'teams.*.participants.*.school' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // Generate the FINAL invoice number FIRST
            $lastRegistration = EventRegistration::whereDate('created_at', today())
                ->orderBy('id', 'desc')
                ->first();
            
            $sequenceNumber = $lastRegistration 
                ? (intval(substr($lastRegistration->invoice_number, -4)) + 1) 
                : 1;
            
            // Generate truly unique invoice with microseconds
            $invoiceNumber = 'EVREG-' . now()->format('YmdHis') . '-' . substr(uniqid(), -4);
            // Example: EVREG-20251231142530-a3f2

            // Calculate price
            $totalTeams = count($validated['teams']);
            $totalPrice = $totalTeams * $event->price_per_team;

            // Split guardian name
            $nameParts = explode(' ', trim($validated['guardian_name']), 2);
            $firstName = $nameParts[0];
            $lastName = $nameParts[1] ?? '';

            // Prepare Midtrans params with FINAL invoice number
            $transaction_details = [
                'order_id' => $invoiceNumber,  // USE FINAL INVOICE, NOT TEMP
                'gross_amount' => (int) $totalPrice,
            ];

            $customer_details = [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $validated['guardian_email'],
                'phone' => $validated['guardian_phone'],
            ];

            $params = [
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
            ];

            // Get Snap token from Midtrans
            $url = 'https://app.sandbox.midtrans.com/snap/v1/transactions';
            $serverKey = config('midtrans.server_key');
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Basic ' . base64_encode($serverKey . ':')
            ]);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            $result = json_decode($response, true);
            
            Log::info('Midtrans API Response (Pre-Registration)', [
                'http_code' => $httpCode,
                'response' => $result,
            ]);
            
            // If payment initialization failed, don't save anything
            if ($httpCode !== 201 && $httpCode !== 200) {
                $errorMessage = $result['error_messages'][0] ?? $result['status_message'] ?? 'Unknown error from payment gateway';

                if (str_contains(strtolower($errorMessage), 'email format is invalid')) {
                    $errorMessage = 'There was an error registering. Please input valid data and try again, or contact us if the problem persists.';
                }

                Log::error('Midtrans API Error (Registration Aborted)', [
                    'http_code' => $httpCode,
                    'error' => $errorMessage,
                    'params' => $params,
                ]);

                DB::rollBack();
                return redirect()->back()->withErrors(['error' => $errorMessage])->withInput();
            }

            $snapToken = $result['token'];

            // Now save the registration with the FINAL invoice number
            $registration = EventRegistration::create([
                'event_id' => $event->id,
                'invoice_number' => $invoiceNumber,  // Make sure this line exists
                'guardian_name' => $validated['guardian_name'],
                'guardian_email' => $validated['guardian_email'],
                'guardian_phone' => $validated['guardian_phone'],
                'total_teams' => $totalTeams,
                'total_price' => $totalPrice,
                'payment_status' => 'pending',
                'payment_token' => $snapToken,
            ]);

            Log::info('Registration Created After Payment Init', [
                'registration_id' => $registration->id,
                'invoice' => $registration->invoice_number,
            ]);

            DB::commit();

            return redirect()->route('payment.show', $registration->id);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Registration Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->withErrors(['error' => 'An error occurred during registration. Please try again.'])->withInput();
        }
    }
}