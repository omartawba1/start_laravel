<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">{!! trans('global.toggle') !!}</span>
                {!! trans('global.menu') !!} <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="img-responsive" src="{{ asset('img/profile1.png') }}"
                     style="max-width: 100px;margin-top: -40px;" alt="">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">{!! trans('auth.login') !!}</a></li>
                    <li><a href="{{ route('register') }}">{!! trans('auth.register') !!}</a></li>
                @else
                    <li><a href="{{ url('/sections') }}">{!! trans('sections.heading') !!}</a></li>
                    <li><a href="{{ url('/articles') }}">{!! trans('articles.heading') !!}</a></li>
                    <li><a href="{{ url('/tags') }}">{!! trans('tags.heading') !!}</a></li>
                    <li><a href="{{ url('/users') }}">{!! trans('users.heading') !!}</a></li>
                    <li>
                        {{ Form::open(['style'=>'margin-top: 15px;', 'id'=>'logoutForm', 'url'=>url('/logout')]) }}<a
                                onclick="document.getElementById('logoutForm').submit();"
                                href="javascript:{}">{!! trans('auth.logout') !!}</a>{{ Form::close() }}
                    </li>
                @endif
                <li>
                    <a href="{{ url('/home/en') }}" class="pull-right" style="padding:15px 1px;">
                        <span class="badge">En</span>
                    </a>
                    <a href="{{ url('/home/de') }}" class="pull-right" style="padding:15px 1px;">
                        <span class="badge">De</span>
                    </a>
                    <a href="{{ url('/home/ar') }}" class="pull-right" style="padding:15px 1px;">
                        <span class="badge">Ar</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
