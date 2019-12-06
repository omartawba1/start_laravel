<?php

namespace App\Http\Controllers;

use App\Events\ArticleCreated;
use App\Http\Requests\ArticlesRequest;
use App\Models\Article;
use App\Models\Section;
use App\Models\Tag;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new Article();

        if (request('title')) {
            $data = $data->where('title', 'LIKE', '%'.request('title').'%');
        }
        if (request('section_id')) {
            $data = $data->where('section_id', request('section_id'));
        }

        $data = $data->latest()->paginate(config('pagination.page_size'));
        $sections = array_merge(['0' => trans('articles.all_sections')], Section::pluck('title', 'id')->toArray());

        return view('articles.index', compact('data', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::pluck('title', 'id')->toArray();
        $tags = Tag::pluck('name', 'id')->toArray();

        return view('articles.edit', compact('sections', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticlesRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        if (empty($data['published'])) {
            $data['published'] = 0;
        }
        $article = Article::create($data);
        $article->tags()->sync(request('tags'));
        event(new ArticleCreated($article));

        return redirect('/articles')->with(['msg' => trans('global.added'), 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Article::findOrFail($id);
        $sections = Section::pluck('title', 'id')->toArray();
        $tags = Tag::pluck('name', 'id')->toArray();

        return view('articles.show', compact('data', 'sections', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Article::with('tags')->findOrFail($id);
        $sections = Section::pluck('title', 'id')->toArray();
        $tags = Tag::pluck('name', 'id')->toArray();

        return view('articles.edit', compact('data', 'sections', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticlesRequest $request
     * @param  Article         $article
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesRequest $request, Article $article)
    {
        $data = $request->only(array_keys($request->rules()));
        if (empty($data['published'])) {
            $data['published'] = 0;
        }
        $article->fill($data)->save();
        $article->tags()->sync(request('tags'));

        return redirect('/articles')->with(['msg' => trans('global.updated'), 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::findOrFail($id)->delete();

        return redirect()->back()->with(['msg' => trans('global.deleted'), 'type' => 'success']);
    }
}
