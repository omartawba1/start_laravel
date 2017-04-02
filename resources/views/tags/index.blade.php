@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Tags</h2>
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
                <div class="panel-heading">Filter</div>
                <div class="panel-body">
                    {{ Form::open(['url'=>url('/tags'), 'method'=>'get', 'class'=>'form-inline']) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Name', ['for'=>'name']) }}
                        {{ Form::text('name', request('name'), ['class'=>'form-control', 'placeholder'=>'Title', 'required']) }}
                        {{ Form::submit('filter', ['class'=>'btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ url('/tags/create') }}"
                       class="btn btn-success pull-right">Add new</a>
                    <h5>Tags</h5>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th># Articles</th>
                            <th>Actions</th>
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
                                    <td>{{ $single->name }}</td>
                                    <td>{{ $single->articles()->count() }}</td>
                                    <td>
                                        <a href="{{ route('tags.show', $single) }}" class="btn btn-default">
                                            view</a>
                                        <a href="{{ route('tags.edit', $single) }} " class="btn btn-primary">
                                            Edit</a>
                                        {{ Form::open(['route'=>['tags.destroy', $single], 'method'=>'delete', 'style'=>'display:inline-flex']) }}
                                        {{ Form::submit('Delete', ['class'=>'btn btn-danger', 'style'=>'float:left']) }}
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{ $data->appends(request()->only('name'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
