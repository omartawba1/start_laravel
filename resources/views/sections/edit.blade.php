@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Sections</h2>
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
                {{ Form::model($data, ['route'=> ['sections.update', $data], 'method'=>'patch', 'class'=>'form-horizontal']) }}
            @else
                {{ Form::open(['url'=> url('/sections'), 'method'=>'post', 'class'=>'form-horizontal']) }}
            @endif
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    {{ Form::label('title', 'Title', ['for'=>'title']) }}
                    {{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Title', 'required']) }}
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
