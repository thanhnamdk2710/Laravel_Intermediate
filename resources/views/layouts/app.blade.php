<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('lang.title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        {{--Navbar Content--}}
        <div class="navbar-header">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('tasks.index') }}">@lang('lang.brand')</a>
        </div>

        {{--Language--}}
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">@lang('lang.language')<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('lang', 'vn') }}">Tiếng Việt</a>
                    </li>
                    <li>
                        <a href="{{ route('lang', 'en') }}">English</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav">
            <!-- Authentication Links -->
            @guest
                <li><a href="{{ route('login') }}">@lang('lang.login')</a></li>
                <li><a href="{{ route('register') }}">@lang('lang.register')</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                       aria-haspopup="true" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                            >
                                @lang('lang.logout')
                            </a>

                            {{ Form::open(['route' => 'logout', 'id' => 'logout-form', 'method' => 'POST', 'style' => 'display: none']) }}
                            {{ Form::close() }}
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </nav>

    @yield('content')
</div>

{{ Html::script(asset('js/app.js')) }}
</body>
</html>
