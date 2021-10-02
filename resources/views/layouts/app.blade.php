<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login</title>
        <link href="{{ URL('/assets/private/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::to('/assets/private/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ URL::to('/assets/private/build/css/custom.css') }}" rel="stylesheet"> 
    </head>

    <body class="login">
        <div id="app">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>