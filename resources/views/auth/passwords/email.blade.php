@extends('layouts.public')

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
                <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">{{ trans('passwords.email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   placeholder="{{ trans('passwords.email') }}" required>
                        </div>
                    </div>


                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            {{ Form::submit(trans('passwords.send_text'), ['class'=>'btn btn-success']) }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
