@extends('layouts.public')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Users</h2>
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
                    {{ Form::open(['url'=>url('/users'), 'method'=>'get', 'class'=>'form-inline']) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Name', ['for'=>'name']) }}
                        {{ Form::text('name', request('name'), ['class'=>'form-control', 'placeholder'=>'Name']) }}
                        {{ Form::label('email', 'Email', ['for'=>'email']) }}
                        {{ Form::text('email', request('email'), ['class'=>'form-control', 'placeholder'=>'Email']) }}
                        {{ Form::submit('filter', ['class'=>'btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ url('/users/create') }}"
                       class="btn btn-success pull-right">Add new</a>
                    <h5>Users</h5>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
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
                                        <a href="{{ route('users.show', $single) }}" class="btn btn-default"> view</a>
                                        <a href="{{ route('users.edit', $single) }} " class="btn btn-primary">
                                            Edit</a>
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
