@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Articles</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $single)
                            <li>{{ $single }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(!empty($data))
                {{ Form::model($data, ['route'=> ['articles.update', $data], 'method'=>'patch', 'class'=>'form-horizontal']) }}
            @else
                {{ Form::open(['url'=> url('/articles'), 'method'=>'post', 'class'=>'form-horizontal']) }}
            @endif

            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    {{ Form::label('title', 'Title', ['for'=>'title']) }}
                    {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title', 'required']) }}
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    {{ Form::label('text', 'Text', ['for'=>'text']) }}
                    {{ Form::textarea('text', null, ['class'=>'form-control', 'placeholder'=>'Article content', 'required']) }}
                </div>
            </div>
            <br>
            <div class="form-group">
                {{ Form::label('section_id', 'Section', ['for'=>'title', 'class'=>'col-sm-2', 'style'=>'text-align: left;']) }}
                <div class="col-sm-8">
                    {{ Form::select('section_id', $sections, request('section_id'), ['class'=>'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('published', 'Published', ['for'=>'published', 'class'=>'col-sm-2', 'style'=>'text-align: left;']) }}
                <div class="col-sm-8">
                    {{ Form::checkbox('published', 1, null, []) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('tags', 'Tags', ['for'=>'tags', 'class'=>'col-sm-2', 'style'=>'text-align: left;']) }}
                <div class="col-sm-8">
                    {{ Form::select('tags[]', $tags, !empty($data->tags)?$data->tags->pluck('id')->toArray(): request('tags'), ['class'=>'form-control select2', 'required', 'multiple']) }}
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="row">
                <div class="form-group col-xs-12">
                    {{ Form::submit('Save', ['class'=>'btn btn-success']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>

    </div>
@endsection
