<?php

namespace App\Http\Controllers;

use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function show($registrationId)
    {
        $registration = EventRegistration::with('event')->findOrFail($registrationId);

        // Split guardian name into first and last name
        $nameParts = explode(' ', $registration->guardian_name, 2);
        $firstName = $nameParts[0];
        $lastName = $nameParts[1] ?? '';

        $transaction_details = [
            'order_id' => $registration->invoice_number,
            'gross_amount' => (int) $registration->total_price,
        ];

        $customer_details = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $registration->guardian_email,
            'phone' => $registration->guardian_phone,
        ];

        $params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        ];

        // Use direct cURL API call (bypasses buggy Midtrans SDK)
        try {
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
            
            // Log the response for debugging
            Log::info('Midtrans API Response', [
                'http_code' => $httpCode,
                'response' => $result,
            ]);
            
            if ($httpCode !== 201 && $httpCode !== 200) {
                $errorMessage = $result['error_messages'][0] ?? $result['status_message'] ?? 'Unknown error from payment gateway';

                // If the error is about email format, show a generic message
                if (str_contains(strtolower($errorMessage), 'email format is invalid')) {
                    $errorMessage = 'There was an error registering. Please input valid data and try again, or contact us if the problem persists.';
                }

                Log::error('Midtrans API Error', [
                    'http_code' => $httpCode,
                    'error' => $errorMessage,
                    'params' => $params,
                ]);
                return back()->withErrors(['error' => $errorMessage])->withInput();
            }
            
            $snapToken = $result['token'];
            return view('payment', compact('snapToken', 'registration'));
            
        } catch (\Exception $e) {
            Log::error('Payment Exception', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->withErrors([
                'error' => 'There was an error registering. Please input valid data and try again, or contact us if the problem persists.'
            ])->withInput();
        }
    }

    /**
     * Handle Midtrans notification callback (for payment status updates)
     */
    public function notification(Request $request)
    {
        try {
            // Log the incoming request
            Log::info('Midtrans Notification Received', [
                'all_data' => $request->all(),
            ]);

            $serverKey = config('midtrans.server_key');
            $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
            
            // Verify signature
            if ($hashed !== $request->signature_key) {
                Log::error('Invalid Midtrans signature', [
                    'expected' => $hashed,
                    'received' => $request->signature_key,
                    'request' => $request->all()
                ]);
                return response()->json(['message' => 'Invalid signature'], 403);
            }

            $orderId = $request->order_id;
            $transactionStatus = $request->transaction_status;
            $fraudStatus = $request->fraud_status ?? 'accept';

            Log::info('Processing Midtrans notification', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'fraud_status' => $fraudStatus,
            ]);

            // Find registration by invoice number
            $registration = EventRegistration::where('invoice_number', $orderId)->first();

            if (!$registration) {
                Log::error('Registration not found for order_id: ' . $orderId);
                return response()->json(['message' => 'Order not found'], 404);
            }

            // Update payment status based on transaction status
            $oldStatus = $registration->payment_status;
            
            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'accept') {
                    $registration->payment_status = 'paid';
                }
            } elseif ($transactionStatus == 'settlement') {
                $registration->payment_status = 'paid';
            } elseif ($transactionStatus == 'pending') {
                $registration->payment_status = 'pending';
            } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                $registration->payment_status = 'failed';
            }

            $registration->save();

            Log::info('Payment status updated', [
                'invoice' => $orderId,
                'old_status' => $oldStatus,
                'new_status' => $registration->payment_status,
            ]);

            return response()->json(['message' => 'Notification processed']);

        } catch (\Exception $e) {
            Log::error('Midtrans notification error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['message' => 'Error processing notification'], 500);
        }
    }
}
