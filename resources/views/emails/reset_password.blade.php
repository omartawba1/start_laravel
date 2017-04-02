<p>{{ trans('emails.welcome') }}</p>
<p>{{ trans('emails.click') }}
    <a href="{{ url('password/reset/'.$token) }}">
        {{ trans('emails.here') }}
    </a>
    {{ trans('emails.reset') }}
</p>

<p>{{ trans('emails.br') }}</p>
<p>{{ config('app.name') }}</p>
