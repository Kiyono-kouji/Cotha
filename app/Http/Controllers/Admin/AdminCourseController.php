<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allClasses = ClassModel::all();
        return view('admin.courses.create', compact('allClasses'));
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
            'slug' => 'required|string|max:255|unique:courses,slug',
            'image' => 'nullable|image|max:2048',
            'classes' => 'nullable|array',
            'classes.*' => 'exists:classes,id',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/CourseResources', 'public');
            $validated['image'] = basename($path);
        }

        $validated['active'] = $request->boolean('active');

        $course = Course::create($validated);

        // Attach selected classes
        if (!empty($validated['classes'])) {
            $course->classes()->attach($validated['classes']);
        }

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
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
        $course = Course::findOrFail($id);
        $allClasses = ClassModel::all();
        $linkedClasses = $course->classes->pluck('id')->toArray();
        return view('admin.courses.edit', compact('course', 'allClasses', 'linkedClasses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'age_range' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'required|string|max:255|unique:courses,slug,' . $course->id,
            'image' => 'nullable|image|max:2048',
            'classes' => 'nullable|array',
            'classes.*' => 'exists:classes,id',
        ]);

        if ($request->hasFile('image')) {
            if ($course->image) {
                Storage::disk('public')->delete('images/CourseResources/' . $course->image);
            }
            $path = $request->file('image')->store('images/CourseResources', 'public');
            $validated['image'] = basename($path);
        }

        $validated['active'] = $request->boolean('active');

        $course->update($validated);

        // Sync selected classes
        $course->classes()->sync($validated['classes'] ?? []);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);

        if ($course->image) {
            Storage::disk('public')->delete('images/CourseResources/' . $course->image);
        }

        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
