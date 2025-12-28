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
        
        // Use the stored token
        $snapToken = $registration->payment_token;
        
        return view('payment', compact('snapToken', 'registration'));
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
