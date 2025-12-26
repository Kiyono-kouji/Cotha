<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTestimonialController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Testimonial::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('school', 'like', '%' . $search . '%')
                  ->orWhere('city', 'like', '%' . $search . '%')
                  ->orWhere('text', 'like', '%' . $search . '%');
        }

        $testimonials = $query->latest()->paginate(12)->withQueryString();

        return view('admin.testimonials.index', compact('testimonials', 'search'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'text' => 'required|string',
            'isFeatured' => 'nullable',
            'active' => 'nullable',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images/StudentPictures', 'public');
            $validated['photo'] = basename($path);
        }

        $validated['isFeatured'] = $request->boolean('isFeatured');
        $validated['active'] = $request->boolean('active');

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'text' => 'required|string',
            'isFeatured' => 'nullable',
            'active' => 'nullable',
        ]);

        if ($request->hasFile('photo')) {
            if ($testimonial->photo) {
                Storage::disk('public')->delete('images/StudentPictures/' . $testimonial->photo);
            }
            $path = $request->file('photo')->store('images/StudentPictures', 'public');
            $validated['photo'] = basename($path);
        }

        $validated['isFeatured'] = $request->boolean('isFeatured');
        $validated['active'] = $request->boolean('active');

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->photo) {
            Storage::disk('public')->delete('images/StudentPictures/' . $testimonial->photo);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}