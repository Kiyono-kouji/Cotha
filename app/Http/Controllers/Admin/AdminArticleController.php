<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminArticleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Article::query()->orderBy('created_at', 'desc');

        if ($search) {
            $query->where('headline', 'like', '%' . $search . '%')
                  ->orWhere('body', 'like', '%' . $search . '%');
        }

        $articles = $query->paginate(10)->withQueryString();

        return view('admin.articles.index', compact('articles', 'search'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'headline' => 'required|string|max:255',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'thumbnail' => 'nullable|image|max:2048',
            'body' => 'required|string',
            'active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image1')) {
            $path = $request->file('image1')->store('images/Articles', 'public');
            $validated['image1'] = basename($path);
        }

        if ($request->hasFile('image2')) {
            $path = $request->file('image2')->store('images/Articles', 'public');
            $validated['image2'] = basename($path);
        }

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('images/Articles', 'public');
            $validated['thumbnail'] = basename($path);
        } elseif (!empty($validated['image1'])) {
            // fallback to Image 1 if no thumbnail provided
            $validated['thumbnail'] = $validated['image1'];
        }

        $validated['active'] = $request->boolean('active');

        Article::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'headline' => 'required|string|max:255',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'thumbnail' => 'nullable|image|max:2048',
            'body' => 'required|string',
            'active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image1')) {
            if ($article->image1) {
                Storage::disk('public')->delete('images/Articles/' . $article->image1);
            }
            $path = $request->file('image1')->store('images/Articles', 'public');
            $validated['image1'] = basename($path);
        }

        if ($request->hasFile('image2')) {
            if ($article->image2) {
                Storage::disk('public')->delete('images/Articles/' . $article->image2);
            }
            $path = $request->file('image2')->store('images/Articles', 'public');
            $validated['image2'] = basename($path);
        }

        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete('images/Articles/' . $article->thumbnail);
            }
            $path = $request->file('thumbnail')->store('images/Articles', 'public');
            $validated['thumbnail'] = basename($path);
        } elseif (!$article->thumbnail) {
            // ensure fallback if no thumbnail yet
            $validated['thumbnail'] = $validated['image1'] ?? $article->image1;
        }

        $validated['active'] = $request->boolean('active');

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        if ($article->image1) {
            Storage::disk('public')->delete('images/Articles/' . $article->image1);
        }

        if ($article->image2) {
            Storage::disk('public')->delete('images/Articles/' . $article->image2);
        }

        if ($article->thumbnail && $article->thumbnail !== $article->image1) {
            Storage::disk('public')->delete('images/Articles/' . $article->thumbnail);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully.');
    }

    public function destroyImage($articleId, $imageField)
    {
        $article = Article::findOrFail($articleId);
        
        if (!in_array($imageField, ['image1', 'image2', 'thumbnail'])) {
            return back()->with('error', 'Invalid image field.');
        }

        if ($article->$imageField) {
            Storage::disk('public')->delete('images/Articles/' . $article->$imageField);
            $article->$imageField = null;
            $article->save();
        }

        return back()->with('success', 'Image deleted successfully.');
    }

    public function destroyAllImages($articleId)
    {
        $article = Article::findOrFail($articleId);
        
        if ($article->image1) {
            Storage::disk('public')->delete('images/Articles/' . $article->image1);
            $article->image1 = null;
        }

        if ($article->image2) {
            Storage::disk('public')->delete('images/Articles/' . $article->image2);
            $article->image2 = null;
        }

        if ($article->thumbnail && $article->thumbnail !== $article->image1) {
            Storage::disk('public')->delete('images/Articles/' . $article->thumbnail);
            $article->thumbnail = null;
        }

        $article->save();

        return back()->with('success', 'All images deleted successfully.');
    }
}