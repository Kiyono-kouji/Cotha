<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->get('category');
        
        $categories = EventCategory::where('active', true)->get();
        
        $query = Event::with('category')
            ->where('date', '>=', now())
            ->orderBy('date', 'asc');
        
        if ($categoryId) {
            $query->where('event_category_id', $categoryId);
        }
        
        $events = $query->paginate(9)->withQueryString();
        
        // Get the selected category for description
        $selectedCategory = $categoryId ? EventCategory::find($categoryId) : null;
        
        return view('events', compact('events', 'categories', 'categoryId', 'selectedCategory'));
    }

    public function show(Event $event)
    {
        $event->load('category');
        return view('eventsdetail', compact('event'));
    }
}