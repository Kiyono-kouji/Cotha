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
        // Validate the request
        $validated = $request->validate([
            'guardian_name' => 'required|string|max:255',
            'guardian_email' => 'required|email|max:255',
            'guardian_phone' => ['required', 'regex:/^\+?\d{9,15}$/'],
            'teams' => 'required|array|min:1',
            'teams.*.team_name' => 'required|string|max:255',
            'teams.*.participants' => 'required|array|min:1',
            'teams.*.participants.*.name' => 'required|string|max:255',
            'teams.*.participants.*.email' => 'required|email|max:255',
            'teams.*.participants.*.school' => 'required|string|max:255',
        ]);

        try {
            // Calculate total participants and price
            $totalParticipants = 0;
            foreach ($validated['teams'] as $teamData) {
                $totalParticipants += count($teamData['participants']);
            }
            $totalPrice = $totalParticipants * $event->price_per_participant;

            // Prepare data for Midtrans payment
            $nameParts = explode(' ', $validated['guardian_name'], 2);
            $firstName = $nameParts[0];
            $lastName = $nameParts[1] ?? '';

            // Generate temporary invoice number (we'll update it after saving)
            $tempInvoiceNumber = 'TEMP-' . now()->format('YmdHis') . '-' . rand(1000, 9999);

            $transaction_details = [
                'order_id' => $tempInvoiceNumber,
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

            // Try to get Snap token from Midtrans FIRST (before saving to database)
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
            
            // Log the response
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
                
                return back()->withErrors(['error' => $errorMessage])->withInput();
            }

            // Payment initialization successful! Now save to database
            DB::beginTransaction();

            // Create the registration
            $registration = EventRegistration::create([
                'event_id' => $event->id,
                'guardian_name' => $validated['guardian_name'],
                'guardian_email' => $validated['guardian_email'],
                'guardian_phone' => $validated['guardian_phone'],
                'total_teams' => count($validated['teams']),
                'total_price' => $totalPrice,
                'payment_status' => 'pending',
            ]);

            // Generate proper invoice number with registration ID
            $registration->invoice_number = 'EVREG-' . now()->setTimezone('Asia/Jakarta')->format('Ymd') . '-' . str_pad($registration->id, 4, '0', STR_PAD_LEFT);
            $registration->save();

            // Create teams and participants
            foreach ($validated['teams'] as $teamData) {
                $team = EventTeam::create([
                    'event_registration_id' => $registration->id,
                    'team_name' => $teamData['team_name'],
                ]);

                foreach ($teamData['participants'] as $participantData) {
                    EventParticipant::create([
                        'event_team_id' => $team->id,
                        'name' => $participantData['name'],
                        'email' => $participantData['email'],
                        'school' => $participantData['school'],
                    ]);
                }
            }

            // Get the Snap token from the result
            $snapToken = $result['token'];
            $registration->payment_token = $snapToken;
            $registration->save();

            DB::commit();

            Log::info('Registration Created After Payment Init', [
                'registration_id' => $registration->id,
                'invoice' => $registration->invoice_number,
            ]);

            // Redirect to payment page with the Snap token and registration ID
            return redirect()->route('payment.show', $registration->id);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Registration Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->withErrors([
                'error' => 'There was an error registering. Please input valid data and try again, or contact us if the problem persists.'
            ])->withInput();
        }
    }
}