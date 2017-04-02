@extends('layouts.public')

@section('content')
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>{{ $article->title }}</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    {{ $article->text }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h6>{!! trans('tags.heading') !!}:
                        @foreach($article->tags as $tag)
                            <span class="label label-default">{{ $tag->name }}</span>
                        @endforeach
                    </h6>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    @include('partials.errors')
                    @include('partials.messages')
                    <div id="post-add-comment">
                        {{ Form::open(['url'=>url('/comments'), 'method'=>'post', 'name'=>'sendComment', 'id'=>'sendComment']) }}
                        {{ Form::hidden('article_id', $article->id) }}
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="text">{!! trans('comments.placeholder') !!}</label>
                                {{ Form::textarea('text', null, ['rows'=>'5', 'data-validation-required-message'=>'Please enter a comment.','class'=>'form-control', 'placeholder'=>trans('comments.placeholder'), 'required']) }}
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                {{ Form::submit(trans('comments.publish'), ['class'=>'btn btn-success']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">{!! trans('comments.heading') !!}
                            <b>({{ $article->comments()->count() }})</b> {!! trans('comments.comment') !!}</div>

                        <div class="panel-body">
                            @if($article->comments()->count())
                                @foreach($article->comments()->get() as $comment)
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
                                    </div>
                                @endforeach
                            @else
                                <p>{!! trans('comments.no_comments') !!}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
