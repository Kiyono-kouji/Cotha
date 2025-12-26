<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Project::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('creator', 'like', '%' . $search . '%')
                  ->orWhere('school', 'like', '%' . $search . '%')
                  ->orWhere('age', 'like', '%' . $search . '%');
        }

        $projects = $query->latest()->paginate(20)->withQueryString();

        return view('admin.projects.index', compact('projects', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'creator' => 'required|string|max:255',
            'creator_grade' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'is_featured' => 'nullable',
            'active' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/StudentProjects', 'public');
            $validated['image'] = basename($path);
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['active'] = $request->boolean('active');

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
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
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'creator' => 'required|string|max:255',
            'creator_grade' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'is_featured' => 'nullable',
            'active' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete('images/StudentProjects/' . $project->image);
            }
            $path = $request->file('image')->store('images/StudentProjects', 'public');
            $validated['image'] = basename($path);
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['active'] = $request->boolean('active');

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Toggle the featured status of a project.
     */
    public function toggleFeatured(string $id)
    {
        $project = Project::findOrFail($id);
        $project->is_featured = ! $project->is_featured;
        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Featured status updated.');
    }

    /**
     * Toggle the active status of a project.
     */
    public function toggleActive(string $id)
    {
        $project = Project::findOrFail($id);
        $project->active = ! $project->active;
        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Active status updated.');
    }

    /**
     * Hide instead of delete: set active=false, keep all info intact.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        // Do NOT delete image or record; just hide
        $project->active = false;
        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project hidden (inactive).');
    }
}
