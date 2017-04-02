@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>{!! trans('sections.heading') !!}</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            @if (session('msg'))
                <div class="alert alert-{{ session()->pull('type') }}" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session()->pull('msg') }}
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('global.filter') !!}</div>
                <div class="panel-body">
                    {{ Form::open(['url'=>url('/sections'), 'method'=>'get', 'class'=>'form-inline']) }}
                    <div class="form-group">
                        {{ Form::label('title', trans('sections.attributes.title'), ['for'=>'title']) }}
                        {{ Form::text('title', request('title'), ['class'=>'form-control', 'placeholder'=>trans('sections.attributes.title'), 'required']) }}
                        {{ Form::submit(trans('global.filter'), ['class'=>'btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ url('/sections/create') }}"
                       class="btn btn-success pull-right">{!! trans('global.new') !!}</a>
                    <h5>{!! trans('sections.heading') !!}</h5>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! trans('sections.attributes.title') !!}</th>
                            <th># {!! trans('articles.heading') !!}</th>
                            <th>{!! trans('global.actions') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($data->isEmpty())
                            <tr>
                                <td colspan="4">{{ trans('global.no_data') }}</td>
                            </tr>
                        @else
                            @foreach ($data as $single)
                                <tr>
                                    <th scope="row">{{ $single->id }}</th>
                                    <td>{{ $single->title }}</td>
                                    <td>{{ $single->articles()->count() }}</td>
                                    <td>
                                        <a href="{{ route('sections.show', $single) }}" class="btn btn-default">
                                            {!! trans('global.view') !!}</a>
                                        <a href="{{ route('sections.edit', $single) }} " class="btn btn-primary">
                                            {!! trans('global.edit') !!}</a>
                                        {{ Form::open(['route'=>['sections.destroy', $single], 'method'=>'delete', 'style'=>'display:inline-flex']) }}
                                        {{ Form::submit(trans('global.delete'), ['class'=>'btn btn-danger', 'style'=>'float:left']) }}
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{ $data->appends(request()->only('title'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
