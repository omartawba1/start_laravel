<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PublicController extends Controller
{
    /**
     * Show the latest articles to the public access.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->published()->paginate(config('pagination.page_size'));

        return view('public.index', compact('articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->increment('views');

        return view('public.show', compact('article'));
    }
}
