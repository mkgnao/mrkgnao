<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>m r k g n a o</title>

    <!-- Fonts -->
    <link href="https://mrkgnao.co/css/dr.css" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://mrkgnao.co/css/main.css" rel='stylesheet' type='text/css'>
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">

<div class="loginout">
    @if (Auth::guest())
        <a href="{{ url('/login') }}">sign in</a>/<a href="{{ url('/register') }}">register</a>
    @else
        {{ Auth::user()->name }}
        <a href="{{ url('/logout') }}">sign out</a>
    @endif
</div>


    @yield('content')

            <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
