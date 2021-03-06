<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>proj</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
        font-size: 70px;
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

    .m-b-md {
        margin-bottom: 150px;
    }

    .stats{
        text-align: center;
        font-family: 'Raleway', sans-serif;
        font-size: 25px;

    }

    h2 {margin: 0;}

</style>
</head>
<body>
    <div class="position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ route('dashboard') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="row justify-content-center">
                <div class="title m-b-md">
                    <h2>WELCOME</h2>
                    <h3>Statistics</h3>

                    <div class="stats">
                        <p>Total Users:{{$users}}</p>
                        <p>Active Users:{{$activeUsers}}</p>
                        <p>Total Movements:{{$movements}}</p>
                        <p>Total Accounts:{{$accounts}}</p>
                    </div>

                </div>

                <div class="links">
                    <a href="{{route('example')}}">Example</a>
                    <a href="{{route('about')}}">About US</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
