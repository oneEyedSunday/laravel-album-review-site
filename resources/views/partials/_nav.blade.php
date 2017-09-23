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
                        {{ config('app.name', 'HipHop Headz') }}
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
                            <li>
                               {{--  {!! Form::open(['url' => ["/"], 'class' => "form navbar-form navbar-right searchform"]) !!}
                                    {!! Form::text('search', null, ["required", "class" => "form-control", "placeholder" => "Search for review..."]) !!}
                                    {!! Form::submit("Search", ["class" => "btn btn-default"]) !!}
                                {!! Form::close() !!} --}}
                                <form action="{{route('reviews.search')}}" method="GET">
                                    <div class="form navbar-form navbar-right">
                                        <input type="text" name="search_text" class="form-control" placeholder="Search">
                                        <span class=""><button type="submit"><span class="fa fa-search"></span></button></span>
                                    </div>
                                </form>
                            </li>
                            <li><a href="{{route('contact.show')}}">Contact Us</a></li>
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