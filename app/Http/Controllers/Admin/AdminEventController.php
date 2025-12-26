<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'desc')->paginate(10);
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'category' => 'required|string',
            'date' => 'required|date',
            'location' => 'nullable|string',
            'is_free' => 'nullable',
            'price' => 'nullable|required_if:is_free,off|string',
        ]);

        $validated['price'] = $request->has('is_free') ? 'Free' : $request->price;

        // ... handle image upload, etc ...
        Event::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event created!');
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'category' => 'required|string',
            'date' => 'required|date',
            'location' => 'nullable|string',
            'is_free' => 'nullable',
            'price' => 'nullable|required_if:is_free,off|string',
        ]);

        $validated['price'] = $request->has('is_free') ? 'Free' : $request->price;

        // ... handle image upload, etc ...
        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event updated!');
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}