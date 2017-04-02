@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>{{ trans('auth.register') }}</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials.errors')
                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">{{ trans('auth.name') }}</label>
                            <input placeholder="{{ trans('auth.name') }}" id="name" type="text" class="form-control"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required autofocus>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">{{ trans('passwords.email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   placeholder="{{ trans('passwords.email') }}" required>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">{{ trans('passwords.password_text') }}</label>

                            <input placeholder="{{ trans('passwords.password_text') }}" id="password" type="password"
                                   class="form-control" name="password"
                                   required>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="password-confirm">{{ trans('passwords.password_text_confirmation') }}</label>
                            <input placeholder="{{ trans('passwords.password_text_confirmation') }}"
                                   id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required>
                        </div>
                    </div>

                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            {{ Form::submit(trans('auth.register'), ['class'=>'btn btn-success']) }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
