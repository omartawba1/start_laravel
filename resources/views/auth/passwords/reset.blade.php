@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>{{ trans('passwords.reset_text') }}</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
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
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">{{ trans('passwords.email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}"
                                   placeholder="{{ trans('passwords.email') }}" required>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">{{ trans('passwords.password_text') }}</label>

                            <input placeholder="{{ trans('passwords.password_text') }}" id="password" type="password" class="form-control" name="password"
                                   required>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="password-confirm">{{ trans('passwords.password_text_confirmation') }}</label>
                            <input placeholder="{{ trans('passwords.password_text_confirmation') }}" id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required>
                        </div>
                    </div>

                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            {{ Form::submit(trans('passwords.reset_text'), ['class'=>'btn btn-success']) }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
