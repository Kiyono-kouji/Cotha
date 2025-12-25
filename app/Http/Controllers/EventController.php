<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Midtrans\Notification;
use Midtrans\Snap;

class EventController extends Controller
{
    /**
     * Display a listing of upcoming events, optionally filtered by category.
     */
    public function index(Request $request)
    {
        $category = $request->get('category');

        $query = Event::upcoming();

        if ($category && in_array($category, ['offline','online','competition','workshop','seminar'])) {
            $query->category($category);
        }

        $events = $query->paginate(9)->withQueryString();

        return view('events.eventindex', compact('events', 'category'));
    }

    public function register(Request $request, Event $event)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:32',
            'note' => 'nullable|string',
        ]);

        // FREE EVENT: Register immediately
        if (strtolower($event->price) === 'free' || $event->price == '0' || $event->price == null) {
            // Free event: register immediately
            EventRegistration::create([
                'event_id' => $event->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'note' => $request->note,
            ]);
            return redirect()->back()->with('success', 'You have registered for this event!');
        }

        // PAID EVENT: Prepare for Midtrans
        $orderId = 'EVT-' . $event->id . '-' . uniqid();
        $amount = (int) preg_replace('/\D/', '', $event->price);

        // Store registration data in session (for demo; for production, use a temp DB table)
        session(['event_registration_' . $orderId => [
            'event_id' => $event->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'note' => $request->note,
        ]]);

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

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Redirect to Midtrans payment page
        return redirect()->away("https://app.midtrans.com/snap/v2/vtweb/{$snapToken}");
    }

    public function midtransNotification(Request $request)
    {
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $orderId = $notif->order_id;

        // Only register if payment is successful
        if (in_array($transaction, ['capture', 'settlement'])) {
            $data = session('event_registration_' . $orderId);

            if ($data) {
                EventRegistration::create($data);
                session()->forget('event_registration_' . $orderId);
            }
        }

        return response()->json(['status' => 'ok']);
    }
}