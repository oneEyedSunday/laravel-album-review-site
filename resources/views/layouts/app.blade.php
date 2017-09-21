<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HipHop Headz') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #333;
            color: #fff;
        }

        label {
            color: #56ec45;
        }

        .jumbotron {
            color: #ff2345;
        }

        footer {
            font-size: 1.6em;
            color: red;
            text-align: center;
            display: inline;
        }

        .review_img {
            width: 70%;
            height: 400px;
            border-radius: 50%;
        }

        .public_text {
            color: #000;
        }

        .pad {
            position: relative;
            padding-left: 50px;
        }

        .shrink {
            width: 32px;
            height: 32px;
            top: 10px;
            left: 10px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle pad" data-toggle="dropdown" role="button" aria-expanded="false" >
                                    <img src="{{ route('filefetch', ['filename' => Auth::user()->avatar, 'admin' => 1]) }}" class="shrink">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('admin.landing') }}">Home</a></li>
                                    <li>
                                        <a href="{{ route('account')}}">Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <footer>
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                Copyright &copy; Idiakose O. Sunday 2017
            </div>
        </div> 
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
