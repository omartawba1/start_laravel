@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Articles</h2>
                <hr class="star-primary">
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (session('msg'))
                    <div class="alert alert-{{ session()->pull('type') }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session()->pull('msg') }}
                    </div>
                @endif
                {{ Form::model($data, ['route'=> ['articles.update', $data], 'method'=>'patch', 'class'=>'form-horizontal']) }}
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        {{ Form::label('title', 'Title', ['for'=>'title']) }}
                        {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title', 'required']) }}
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        {{ Form::label('text', 'Text', ['for'=>'title']) }}
                        {{ Form::textarea('text', null, ['class'=>'form-control', 'placeholder'=>'Text', 'required']) }}
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
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <a class="btn btn-success" href="{{ url('/articles') }}"
                           style="margin-top: 10px;">{{ trans('global.back') }}</a>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Comments <b>({{ $data->comments()->count() }})</b> Comment</div>

                    <div class="panel-body">
                        @if($data->comments()->count())
                            @foreach($data->comments()->get() as $comment)
                                <div class="row article-comment"
                                     style="margin:5px 0;border-bottom: 1px solid #2C3E50">
                                    <div class="col-sm-4">
                                        <img src="{{ url('img/profile.png') }}" style="height: 75px;">
                                        {{ $comment->user()->first()->name or 'Anonymous' }}
                                        <br/>on {{ $comment->created_at }}
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $comment->text }}
                                    </div>
                                    {{ Form::open(['route'=>['comments.destroy', $comment], 'method'=>'delete', 'class'=>'pull-right','style'=>'display:inline-flex;']) }}
                                    {{ Form::submit('Delete this', ['class'=>'btn btn-danger', 'style'=>'float:right']) }}
                                    {{ Form::close() }}
                                </div>
                            @endforeach
                        @else
                            <p>Sorry! no comments yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
