<p>{{ trans('emails.welcome') }}</p>
<p>{{ trans('emails.new_article') }}</p>
<p>{{ trans('emails.click') }}
    <a href="{{ url('/show/'.$article->id) }}">
        {{ trans('emails.here') }}
    </a>
    {{ trans('emails.review') }}
</p>


<p>{{ trans('emails.br') }}</p>
<p>{{ config('app.name') }}</p>
