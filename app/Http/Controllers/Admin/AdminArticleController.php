<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'headline' => 'required|string|max:255',
            'body' => 'required|string',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image1')) {
            $validated['image1'] = $request->file('image1')->store('images/Articles', 'public');
        }
        if ($request->hasFile('image2')) {
            $validated['image2'] = $request->file('image2')->store('images/Articles', 'public');
        }
        $validated['active'] = $request->boolean('active');

        Article::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article created!');
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
            'body' => 'required|string',
            'image1' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image1')) {
            if ($article->image1) Storage::disk('public')->delete($article->image1);
            $validated['image1'] = $request->file('image1')->store('images/Articles', 'public');
        }
        if ($request->hasFile('image2')) {
            if ($article->image2) Storage::disk('public')->delete($article->image2);
            $validated['image2'] = $request->file('image2')->store('images/Articles', 'public');
        }
        $validated['active'] = $request->boolean('active');

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if ($article->image1) Storage::disk('public')->delete($article->image1);
        if ($article->image2) Storage::disk('public')->delete($article->image2);
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted!');
    }
}