<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- <title>@yield('title') - Gente OK</title> -->
        <title>Login - Gente OK</title>
        
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/png" href="{{ asset('/images/favicon.png') }}"/>

        <!-- Styles -->
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    </head>
    <body class="login-bg">
        @yield('content')

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <!-- Custom Theme JavaScript -->
        <!-- <script src="{{ asset('/js/index.js') }}"></script> -->
    </body>
</html>
