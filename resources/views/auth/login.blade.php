@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>{{ trans('auth.login') }}</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials.errors')
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">{{ trans('passwords.email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   placeholder="{{ trans('passwords.email') }}"
                                   required autofocus>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="password">{{ trans('passwords.password_text') }}</label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="{{ trans('passwords.password_text') }}" required>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group">
                            <div class="form-group col-xs-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{ trans('auth.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            {{ Form::submit(trans('auth.login'), ['class'=>'btn btn-success']) }}
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ trans('auth.forget_password') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
