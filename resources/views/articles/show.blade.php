@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>{{ trans('articles.heading') }}</h2>
                <hr class="star-primary">
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials.messages')
                {{ Form::model($data, ['route'=> ['articles.update', $data], 'method'=>'patch', 'class'=>'form-horizontal']) }}
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        {{ Form::label('title', trans('articles.attributes.title'), ['for'=>'title']) }}
                        {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title', 'required']) }}
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        {{ Form::label('text', trans('articles.attributes.text'), ['for'=>'title']) }}
                        {{ Form::textarea('text', null, ['class'=>'form-control', 'placeholder'=>'Text', 'required']) }}
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
                        {{ Form::select('tags[]', $tags, $data->tags->pluck('id')->toArray(), ['class'=>'form-control select2', 'required', 'multiple']) }}
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
                    <div class="panel-heading">{{ trans('comments.heading') }} <b>({{ $data->comments()->count() }}
                            )</b> {{ trans('comments.comment') }}</div>

                    <div class="panel-body">
                        @if($data->comments()->count())
                            @foreach($data->comments()->get() as $comment)
                                <div class="row article-comment"
                                     style="margin:5px 0;border-bottom: 1px solid #2C3E50">
                                    <div class="col-sm-4">
                                        <img src="{{ url('img/profile.png') }}" style="height: 75px;">
                                        {{ $comment->user()->first()->name or trans('global.anonymous') }}
                                        <br/>{{ trans('global.on')." ".$comment->created_at }}
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $comment->text }}
                                    </div>
                                    {{ Form::open(['route'=>['comments.destroy', $comment], 'method'=>'delete', 'class'=>'pull-right','style'=>'display:inline-flex;']) }}
                                    {{ Form::submit(trans('global.delete'), ['class'=>'btn btn-danger', 'style'=>'float:right']) }}
                                    {{ Form::close() }}
                                </div>
                            @endforeach
                        @else
                            <p>{{ trans('comments.no_comments') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
