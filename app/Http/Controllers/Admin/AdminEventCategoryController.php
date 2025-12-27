<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class AdminEventCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = EventCategory::query()->orderBy('name');

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $categories = $query->paginate(20)->withQueryString();

        return view('admin.event_categories.index', compact('categories', 'search'));
    }

    public function create()
    {
        return view('admin.event_categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:event_categories,name',
            'description' => 'nullable|string|max:255',
            'active' => 'nullable|boolean',
        ]);
        $validated['active'] = $request->boolean('active');
        EventCategory::create($validated);

        return redirect()->route('admin.event_categories.index')->with('success', 'Category created!');
    }

    public function edit(EventCategory $event_category)
    {
        return view('admin.event_categories.edit', compact('event_category'));
    }

    public function update(Request $request, EventCategory $event_category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:event_categories,name,' . $event_category->id,
            'description' => 'nullable|string|max:255',
            'active' => 'nullable|boolean',
        ]);
        $validated['active'] = $request->boolean('active');
        $event_category->update($validated);

        return redirect()->route('admin.event_categories.index')->with('success', 'Category updated!');
    }

    public function destroy(EventCategory $event_category)
    {
        $event_category->delete();
        return redirect()->route('admin.event_categories.index')->with('success', 'Category deleted!');
    }
}