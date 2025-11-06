<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassModel::all();
        return view('admin.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Convert textarea strings to arrays before validation
        $request->merge([
            'requirements' => $request->requirements ? array_filter(array_map('trim', explode("\n", $request->requirements))) : [],
            'concepts'     => $request->concepts ? array_filter(array_map('trim', explode("\n", $request->concepts))) : [],
            'projects'     => $request->projects ? array_filter(array_map('trim', explode("\n", $request->projects))) : [],
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'meeting_info' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|array',
            'note' => 'nullable|string',
            'concepts' => 'nullable|array',
            'projects' => 'nullable|array',
            'button_link' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/ClassesResources', 'public');
            $validated['image'] = basename($path);
        }

        ClassModel::create($validated);

        return redirect()->route('admin.classes.index')->with('success', 'Class created successfully.');
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
    public function edit(string $id)
    {
        $class = ClassModel::findOrFail($id);
        return view('admin.classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge([
            'requirements' => $request->requirements ? array_filter(array_map('trim', explode("\n", $request->requirements))) : [],
            'concepts'     => $request->concepts ? array_filter(array_map('trim', explode("\n", $request->concepts))) : [],
            'projects'     => $request->projects ? array_filter(array_map('trim', explode("\n", $request->projects))) : [],
        ]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'meeting_info' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|array',
            'note' => 'nullable|string',
            'concepts' => 'nullable|array',
            'projects' => 'nullable|array',
            'button_link' => 'nullable|string|max:255',
        ]);

        $class = ClassModel::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($class->image) {
                Storage::disk('public')->delete('images/ClassesResources/' . $class->image);
            }
            $path = $request->file('image')->store('images/ClassesResources', 'public');
            $validated['image'] = basename($path);
        }

        $class->update($validated);

        return redirect()->route('admin.classes.index')->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = ClassModel::findOrFail($id);

        if ($class->image) {
            Storage::disk('public')->delete('images/ClassesResources/' . $class->image);
        }

        $class->delete();

        return redirect()->route('admin.classes.index')->with('success', 'Class deleted successfully.');
    }
}
