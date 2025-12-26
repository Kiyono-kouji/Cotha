<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Level::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('subtitle', 'like', '%' . $search . '%')
                  ->orWhere('age_range', 'like', '%' . $search . '%');
        }

        $levels = $query->latest()->paginate(20)->withQueryString();

        return view('admin.levels.index', compact('levels', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allClasses = ClassModel::all();
        return view('admin.levels.create', compact('allClasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'age_range' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'isFeatured' => 'nullable',
            'active' => 'nullable',
            'classes' => 'nullable|array',
            'classes.*' => 'exists:classes,id',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/LevelResources', 'public');
            $validated['image'] = basename($path);
        }

        $validated['isFeatured'] = $request->boolean('isFeatured');
        $validated['active'] = $request->boolean('active');

        $level = Level::create($validated);

        if (!empty($validated['classes'])) {
            $level->classes()->attach($validated['classes']);
        }

        return redirect()->route('admin.levels.index')->with('success', 'Level created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $level = Level::findOrFail($id);
        $allClasses = ClassModel::all();
        $linkedClasses = $level->classes->pluck('id')->toArray();
        return view('admin.levels.edit', compact('level', 'allClasses', 'linkedClasses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $level = Level::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'age_range' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'isFeatured' => 'nullable',
            'active' => 'nullable',
            'classes' => 'nullable|array',
            'classes.*' => 'exists:classes,id',
        ]);

        if ($request->hasFile('image')) {
            if ($level->image) {
                Storage::disk('public')->delete('images/LevelResources/' . $level->image);
            }
            $path = $request->file('image')->store('images/LevelResources', 'public');
            $validated['image'] = basename($path);
        }

        $validated['isFeatured'] = $request->boolean('isFeatured');
        $validated['active'] = $request->boolean('active');

        $level->update($validated);

        if (isset($validated['classes'])) {
            $level->classes()->sync($validated['classes']);
        } else {
            $level->classes()->detach();
        }

        return redirect()->route('admin.levels.index')->with('success', 'Level updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $level = Level::findOrFail($id);

        if ($level->image) {
            Storage::disk('public')->delete('images/LevelResources/' . $level->image);
        }

        $level->classes()->detach();
        $level->delete();

        return redirect()->route('admin.levels.index')->with('success', 'Level deleted successfully.');
    }
}
