<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class AdminEventRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = EventRegistration::with('event')->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('invoice_number', 'like', "%$search%")
                  ->orWhere('guardian_name', 'like', "%$search%")
                  ->orWhere('guardian_email', 'like', "%$search%")
                  ->orWhere('guardian_phone', 'like', "%$search%")
                  ->orWhereHas('event', function($q2) use ($search) {
                      $q2->where('title', 'like', "%$search%");
                  })
                  ->orWhere('payment_status', 'like', "%$search%");
            });
        }

        $registrations = $query->paginate(20)->appends($request->query());
        return view('admin.event.event_registration', compact('registrations'));
    }

    public function show($id)
    {
        $registration = EventRegistration::with(['event', 'teams.participants'])->findOrFail($id);
        return view('admin.event.event_registration_show', compact('registration'));
    }

    public function destroy($id)
    {
        $registration = EventRegistration::findOrFail($id);
        $registration->delete();
        return redirect()->route('admin.event_registrations.index')->with('success', 'Registration deleted');
    }
}
