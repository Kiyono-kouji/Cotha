<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class AdminRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::query()->latest();

        if ($request->filled('class_title')) {
            $query->where('class_title', 'like', '%'.$request->input('class_title').'%');
        }
        if ($request->filled('class_level')) {
            $query->where('class_level', 'like', '%'.$request->input('class_level').'%');
        }
        if ($request->filled('child_name')) {
            $query->where('child_name', 'like', '%'.$request->input('child_name').'%');
        }
        if ($request->filled('city')) {
            $query->where('city', 'like', '%'.$request->input('city').'%');
        }

        $registrations = $query->paginate(20)->appends($request->query());
        return view('admin.registrations.index', compact('registrations'));
    }

    public function show($id)
    {
        $registration = Registration::findOrFail($id);
        return view('admin.registrations.show', compact('registration'));
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('admin.registrations.index')->with('success', 'Registration deleted');
    }
}