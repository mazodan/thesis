<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('css')
        
        <!-- TinyMCE Scripts -->
        @include('js.ckedit')

    </head>
    <body>
        <div id="app">
            <nav class="navbar has-shadow">
                <div class="container">
                    <div class="navbar-brand">
                        <a href="{{ url('/dashboard') }}" class="navbar-item">{{ config('app.name', 'Laravel') }}</a>

                        <div class="navbar-burger burger" data-target="navMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <div class="navbar-menu" id="navMenu">
                        <div class="navbar-start"></div>

                        <div class="navbar-end">
                            @if (Auth::guest())
                                <a class="navbar-item " href="{{ route('login') }}">Login</a>
                                <a class="navbar-item " href="{{ route('register') }}">Register</a>
                            @else
                                 @if(Carbon\Carbon::now()->hour > 6 && Carbon\Carbon::now()->hour < 12)
                                        <a class="navbar-item" href="#">Good Morning</a>
                                    @elseif(Carbon\Carbon::now()->hour >= 12 && Carbon\Carbon::now()->hour < 18)
                                        <a class="navbar-item" href="#">Good Afternoon</a>
                                    @else
                                        <a class="navbar-item" href="#">Good Evening</a>
                                    @endif
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link" href="#">Dr. {{ Auth::user()->lname }}</a>
                                    <div class="navbar-dropdown">
                                        <a class="navbar-item" href="{{route('profile')}}">Update Profile</a>
                                        <a class="navbar-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
            @include('layouts.notify')
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
