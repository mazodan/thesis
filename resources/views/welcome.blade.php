<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{config('app.name', 'Laravel')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .versioninfo {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            .framwork_title {
                font-weight: 600;
                padding-top: 20px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title is-3">
                    Welcome to {{ config('app.name', 'Citimedic Medical Arts - Patient Record Management System') }}
                </div>
                <div class="container">
                    <div class="tile is-ancestor is-centered">
                        <div class="tile is-parent is-2">                        
                        </div>
                        <div class="tile is-parent is-4 adminTile">
                            <a href="{{url('/register')}}" class="tile is-child notification">
                                <article >
                                    <p class="title is-2 has-text-black">New User?</p>
                                    <p class="subtitle has-text-black">Register here</p>
                                </article>
                            </a>                       
                        </div>
                        <div class="tile is-parent is-4 doctorTile">
                            <a href="{{url('/login')}}" class="tile is-child notification is-success">
                                <article>
                                    <p class="title is-2">Doctors</p>
                                    <p class="subtitle">Log in here</p>
                                </article>   
                            </a>
                        </div>
                    </div>
                    <div class="title is-4">
                        Note: this is still an early alpha, some functionality might break <br>
                        Version: 0.02a - Early Alpha - Almost Done Hopefully
                        <br><br>
                        Made with Laravel, BulmaCSS, Datatables, AJAX coffee (Lots of Coffee).
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
