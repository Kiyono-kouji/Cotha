<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

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
        return view('articledetail', compact('article'));
    }
}