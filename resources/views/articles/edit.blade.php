@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>{{ trans('articles.heading') }}</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            @include('partials.errors')
            @if(!empty($data))
                {{ Form::model($data, ['route'=> ['articles.update', $data], 'method'=>'patch', 'class'=>'form-horizontal']) }}
            @else
                {{ Form::open(['url'=> url('/articles'), 'method'=>'post', 'class'=>'form-horizontal']) }}
            @endif

            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    {{ Form::label('title', trans('articles.attributes.title'), ['for'=>'title']) }}
                    {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>trans('articles.attributes.title'), 'required']) }}
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    {{ Form::label('text', trans('articles.attributes.text'), ['for'=>'text']) }}
                    {{ Form::textarea('text', null, ['class'=>'form-control', 'placeholder'=>trans('articles.attributes.text'), 'required']) }}
                </div>
            </div>
            <br>
            <div class="form-group">
                {{ Form::label('section_id', trans('articles.attributes.section_id'), ['for'=>'title', 'class'=>'col-sm-2', 'style'=>'text-align: left;']) }}
                <div class="col-sm-8">
                    {{ Form::select('section_id', $sections, request('section_id'), ['class'=>'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('published', trans('articles.attributes.published'), ['for'=>'published', 'class'=>'col-sm-2', 'style'=>'text-align: left;']) }}
                <div class="col-sm-8">
                    {{ Form::checkbox('published', 1, null, []) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('tags', trans('tags.heading'), ['for'=>'tags', 'class'=>'col-sm-2', 'style'=>'text-align: left;']) }}
                <div class="col-sm-8">
                    {{ Form::select('tags[]', $tags, !empty($data->tags)?$data->tags->pluck('id')->toArray(): request('tags'), ['class'=>'form-control select2', 'required', 'multiple']) }}
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="row">
                <div class="form-group col-xs-12">
                    {{ Form::submit(trans('global.save'), ['class'=>'btn btn-success']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>

    </div>
@endsection
