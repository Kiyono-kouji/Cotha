<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('active', true)
            ->latest()
            ->paginate(9);

        return view('article', compact('articles')); // <-- fix here
    }

    public function show(Article $article)
    {
        if (!$article->active) {
            abort(404);
        }

        // Render the flat Blade file: resources/views/article.details.blade.php
        return view()->file(
            resource_path('views/article.details.blade.php'),
            ['article' => $article]
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'headline' => 'required|string|max:255',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
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

        // Convert checkbox to boolean
        $validated['active'] = $request->boolean('active');

        Article::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'headline' => 'required|string|max:255',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
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

        // Convert checkbox to boolean
        $validated['active'] = $request->boolean('active');

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
    }
}