@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>{!! trans('tags.heading') !!}</h2>
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
                {{ Form::model($data, ['route'=> ['tags.update', $data], 'method'=>'patch', 'class'=>'form-horizontal']) }}
            @else
                {{ Form::open(['url'=> url('/tags'), 'method'=>'post', 'class'=>'form-horizontal']) }}
            @endif
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    {{ Form::label('name', trans('tags.attributes.name'), ['for'=>'name']) }}
                    {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>trans('tags.attributes.name'), 'required']) }}
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
