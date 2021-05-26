<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagsRequest;
use App\Models\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new Tag();
        if (request('name')) {
            $data = $data->where('name', 'LIKE', '%'.request('name').'%');
        }
        $data = $data->latest()->paginate(config('pagination.page_size'));

        return view('tags.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TagsRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TagsRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        Tag::create($data);

        return redirect('/tags')->with(['msg' => trans('global.added'), 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tag::findOrFail($id);

        return view('tags.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tag::findOrFail($id);

        return view('tags.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TagsRequest $request
     * @param  int         $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TagsRequest $request, $id)
    {
        $data = $request->only(array_keys($request->rules()));
        Tag::findOrFail($id)->fill($data)->save();

        return redirect('/tags')->with(['msg' => trans('global.updated'), 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        if ($tag->articles()->count()) {
            return redirect()->back()->with(['msg' => trans('global.cannot_delete'), 'type' => 'danger']);
        }
        $tag->delete();

        return redirect()->back()->with(['msg' => trans('global.deleted'), 'type' => 'success']);
    }
}
