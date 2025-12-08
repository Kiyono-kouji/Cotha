<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
        // Optional filter by category: offline, online, competition, workshop, seminar
        $category = $request->string('category')->toString();

        $query = Event::upcoming();

        if ($category) {
            $query = $query->category($category);
        }

        $events = $query->paginate(9)->withQueryString();

        return view('events.eventindex', compact('events', 'category'));
    }
}