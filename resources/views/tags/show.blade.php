@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Tags</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            {{ Form::model($data, ['route'=> ['tags.update', $data], 'method'=>'patch', 'class'=>'form-horizontal']) }}
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    {{ Form::label('name', 'Name', ['for'=>'title']) }}
                    {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name', 'required']) }}
                </div>
            </div>
            {{Form::close()}}
            <br>
            <div id="success"></div>
            <div class="row">
                <div class="form-group col-xs-12">
                    <a class="btn btn-success" href="{{ url('/tags') }}"
                       style="margin-top: 10px;">{{ trans('global.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
