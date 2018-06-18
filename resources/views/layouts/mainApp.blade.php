<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel E-Commerce - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- OneTech Style Files -->
    <link href="{{asset('/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">


    <!-- Cutom CSS -->
    @yield('css')
</head>
<body>
<div id="app">
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            @include('inc.mainTopbar')
            @include('inc.mainHeader')
            @include('inc.mainNavigation')
            @include('inc.mainPageMenu')
        </header>

        @yield('content')

        @include('layouts.footer')
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

@include('inc.scripts')

<!-- Custom Scripts -->
@yield('scripts')
</body>
</html>
