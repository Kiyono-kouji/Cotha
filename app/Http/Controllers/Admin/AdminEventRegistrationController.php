<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class AdminEventRegistrationController extends Controller
{
    public function index()
    {
        $registrations = \App\Models\EventRegistration::with('event')->latest()->paginate(20);
        return view('admin.event.event_registration', compact('registrations'));
    }

    public function show($id)
    {
        $registration = \App\Models\EventRegistration::with('event')->findOrFail($id);
        // You can create a show view, e.g. admin/event/event_registration_show.blade.php
        return view('admin.event.event_registration_show', compact('registration'));
    }

    public function destroy($id)
    {
        $registration = EventRegistration::findOrFail($id);
        $registration->delete();
        return redirect()->route('admin.event_registrations.index')->with('success', 'Registration deleted');
    }
}
