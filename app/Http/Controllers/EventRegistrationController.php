<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Midtrans\Snap;

class EventRegistrationController extends Controller
{
    public function store(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'wa' => 'nullable|string|max:32',
        ]);

        $data['event_id'] = $event->id;
        EventRegistration::create($data);

        return redirect()->back()->with('success', 'Registration successful!');
    }

    public function register(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:32',
            'note' => 'nullable|string',
        ]);

        // Check if event is free
        if (strtolower($event->price) === 'free' || $event->price == '0' || $event->price == null) {
            EventRegistration::create([
                'event_id' => $event->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'note' => $request->note,
            ]);
            return redirect()->back()->with('success', 'You have registered for this event!');
        }

        // Paid event: Prepare Midtrans payment
        $orderId = 'EVT-' . $event->id . '-' . uniqid();
        $amount = (int) preg_replace('/\D/', '', $event->price);

        // Save registration data temporarily in session (or DB if you prefer)
        Session::put('event_registration_' . $orderId, [
            'event_id' => $event->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'note' => $request->note,
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'item_details' => [
                [
                    'id' => $event->id,
                    'price' => $amount,
                    'quantity' => 1,
                    'name' => $event->title,
                ]
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        // Redirect to Midtrans payment page
        return redirect()->away("https://app.midtrans.com/snap/v2/vtweb/{$snapToken}");
    }
}