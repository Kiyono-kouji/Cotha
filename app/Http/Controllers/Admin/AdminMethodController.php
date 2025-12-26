<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMethodController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Method::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('label', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }

        $methods = $query->latest()->paginate(20)->withQueryString();

        return view('admin.methods.index', compact('methods', 'search'));
    }

    public function create()
    {
        return view('admin.methods.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'label' => 'required|string|max:255',
            'description' => 'required|string',
            'active' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/LearningMethods', 'public');
            $validated['image'] = basename($path);
        }

        $validated['active'] = $request->boolean('active'); // <-- Always set as boolean

        \App\Models\Method::create($validated);

        return redirect()->route('admin.methods.index')->with('success', 'Method created successfully.');
    }

    public function edit($id)
    {
        $method = Method::findOrFail($id);
        return view('admin.methods.edit', compact('method'));
    }

    public function update(Request $request, $id)
    {
        $method = Method::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'label' => 'required|string|max:255',
            'description' => 'required|string',
            'active' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            if ($method->image) {
                Storage::disk('public')->delete('images/LearningMethods/' . $method->image);
            }
            $path = $request->file('image')->store('images/LearningMethods', 'public');
            $validated['image'] = basename($path);
        }

        $validated['active'] = $request->boolean('active');

        $method->update($validated);

        return redirect()->route('admin.methods.index')->with('success', 'Method updated successfully.');
    }

    public function destroy($id)
    {
        $method = Method::findOrFail($id);

        if ($method->image) {
            Storage::disk('public')->delete('images/LearningMethods/' . $method->image);
        }

        $method->delete();

        return redirect()->route('admin.methods.index')->with('success', 'Method deleted successfully.');
    }
}