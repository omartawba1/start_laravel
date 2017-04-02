@extends('layouts.public')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>{!! trans('users.heading') !!}</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            @include('partials.messages')
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('global.filter') !!}</div>
                <div class="panel-body">
                    {{ Form::open(['url'=>url('/users'), 'method'=>'get', 'class'=>'form-inline']) }}
                    <div class="form-group">
                        {{ Form::label('name', trans('users.attributes.name'), ['for'=>'name']) }}
                        {{ Form::text('name', request('name'), ['class'=>'form-control', 'placeholder'=>trans('users.attributes.name')]) }}
                        {{ Form::label('email', trans('users.attributes.email'), ['for'=>'email']) }}
                        {{ Form::text('email', request('email'), ['class'=>'form-control', 'placeholder'=>trans('users.attributes.email')]) }}
                        {{ Form::submit(trans('global.filter'), ['class'=>'btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ url('/users/create') }}"
                       class="btn btn-success pull-right">{!! trans('global.new') !!}</a>
                    <h5>{{ trans('users.heading') }}</h5>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! trans('users.attributes.name') !!}</th>
                            <th>{!! trans('users.attributes.email') !!}</th>
                            <th>{!! trans('global.actions') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($data->isEmpty())
                            <tr>
                                <td colspan="4">{{ trans('globals.no_data') }}</td>
                            </tr>
                        @else
                            @foreach ($data as $single)
                                <tr>
                                    <th scope="row">{{ $single->id }}</th>
                                    <td>{{ $single->name }}</td>
                                    <td>{{ $single->email }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $single) }}"
                                           class="btn btn-default"> {!! trans('global.view') !!}</a>
                                        <a href="{{ route('users.edit', $single) }} " class="btn btn-primary">
                                            {!! trans('global.edit') !!}</a>
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
