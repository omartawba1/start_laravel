<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionsRequest;
use App\Models\Section;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new Section();
        if (request('title')) {
            $data = $data->where('title', 'LIKE', '%' . request('title') . '%');
        }
        $data = $data->latest()->paginate(config('pagination.page_size'));
        
        return view('sections.index', compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sections.edit');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  SectionsRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SectionsRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        Section::create($data);
        
        return redirect('/sections')->with(['msg'=> trans('global.added'), 'type'=>'success']);
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
        $data = Section::findOrFail($id);
        
        return view('sections.show', compact('data'));
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
        $data = Section::findOrFail($id);
        
        return view('sections.edit', compact('data'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  SectionsRequest $request
     * @param  Section         $section
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SectionsRequest $request, Section $section)
    {
        $data = $request->only(array_keys($request->rules()));
        $section->fill($data);
        $section->save();
        
        return redirect('/sections')->with(['msg'=> trans('global.updated'), 'type'=>'success']);
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
        $data = Section::findOrFail($id);
        if ($data->articles()->count()) {
            return redirect()->back()->with(['msg'=> trans('global.cannot_delete'), 'type'=>'danger']);
        }
        $data->delete();
        
        return redirect()->back()->with(['msg'=> trans('global.deleted'), 'type'=>'success']);
    }
}
