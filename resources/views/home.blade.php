@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>{!! trans('global.dashboard') !!}</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-2">
                {!! trans('global.dashboard_intro') !!}
            </div>
            <div class="col-lg-4">
                <p>{!! trans('global.dashboard_intro1') !!}</p>
            </div>
            <div class="col-lg-4">
                {!! trans('global.dashboard_about') !!}
            </div>
        </div>
    </div>
@endsection
