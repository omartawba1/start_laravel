@extends('layouts.public')

@section('content')
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>{{ trans('auth.401') }}
                        <a href="/" class="btn btn-primary">{{ trans('auth.go_home') }}</a>
                    </h2>
                </div>
            </div>
        </div>
    </section>
@endsection