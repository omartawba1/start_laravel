<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="img-responsive" src="{{ asset('img/profile1.png') }}"
                     style="max-width: 100px;margin-top: -40px;" alt="">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li><a href="{{ url('/sections') }}">Sections</a></li>
                    <li><a href="{{ url('/articles') }}">Articles</a></li>
                    <li><a href="{{ url('/users') }}">Users</a></li>
                    <li>
                        {{ Form::open(['style'=>'margin-top: 15px;', 'id'=>'logoutForm', 'url'=>url('/logout')]) }}<a
                                onclick="document.getElementById('logoutForm').submit();"
                                href="javascript:{}">Logout</a>{{ Form::close() }}</li>
                @endif
            </ul>
        </div>
    </div>
</nav>