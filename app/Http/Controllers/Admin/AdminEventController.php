<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Event::with('category')->orderBy('date', 'desc');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhereHas('category', function($catQ) use ($search) {
                      $catQ->where('name', 'like', '%' . $search . '%');
                  })
                  ->orWhere('location', 'like', '%' . $search . '%');
            });
        }

        $events = $query->paginate(20)->withQueryString();

        return view('admin.event.index', compact('events', 'search'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_category_id' => 'required|exists:event_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'registration_type' => 'required|in:individual,team',
            'max_team_members' => 'nullable|integer|min:2',
            'price_per_participant' => 'required|numeric|min:0',
            'date' => 'required|date',
            'last_registration_at' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'result' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/EventResources', 'public');
            $validated['image'] = $path;
        }

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
            'event_category_id' => 'required|exists:event_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'registration_type' => 'required|in:individual,team',
            'max_team_members' => 'nullable|integer|min:2',
            'price_per_participant' => 'required|numeric|min:0',
            'date' => 'required|date',
            'last_registration_at' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'result' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $path = $request->file('image')->store('images/EventResources', 'public');
            $validated['image'] = $path;
        }

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