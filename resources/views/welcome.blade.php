<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dating</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
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
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
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
            @auth
                <a class="user-name" href="{{ url('/user-card') }}">
{{--                    <button class="btn btn-primary">--}}
                        <strong
                            class="user-name">{{ Auth::user()->name }}
                        </strong> Profile
{{--                    </button>--}}
                </a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">

        <div class="title m-b-md">
            Dating
            <p style="font-size:20px;">Meet people from all over the world!</p>
        </div>
        <a id="dating" href="{{ url('/dating') }}">
            <strong>Start Dating</strong>
        </a>
    </div>
</div>
</body>
</html>

<style>

    /*body{*/
    /*    background-color: #c8eaf6;*/
    /*}*/

    .user-name {
        color: #1a95ff;
    }

    #dating {
        background-color: #4CAF50; /* Green */
        border: none;
        border-radius: 15px;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    #dating:hover {
        background-color: #1a95ff;
        transition: 0.5s;
    }

    /*#dating:hover {*/
    /*    background-color: #1a95ff;*/
    /*    transition: 0.5s;*/
    /*}*/


</style>
