<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>SaveMyFood</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color:rgb(29, 29, 29)">
    <nav style="color:white; font-size: 1.25rem" class="navbar navbar-expand-dark navbar-dark bg-dark d-flex justify-content-between px-5 align-items-center">
        <div>
            <img style="width: 50px" src="{{URL('images/save my food-logos_white.png')}}">
           <b> Save My Food </b>
        </div>
        <div>
            <div class="d-flex justify-content-center">
                <span class="mx-4">  <a href="/home"
                    style="text-decoration: none; background-color: transparent; border:none; color:inherit ; font-weight: 700"
                    >Home</a> </b> </span>
                <span class="mx-4">  Hi <b> {{ auth()->user()->name }} </b> </span>
                <form class="mx-4" class="inline" method="POST" action="/logout">
                @csrf
                    <button
                    style="text-decoration: none; background-color: transparent; border:none; color:inherit ; font-weight: 700"
                    >Logout</button>
                </form>
            </div>

        </div>
    </nav>
    @yield('loggedincontent')

</body>
</html>
