<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Added to fix FOUC on UI navigation --}}
    <link rel="preload" href="{{ asset('scss/app.scss') }}" as="style">
    <link rel="stylesheet" href="{{ asset('scss/app.scss') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ Vite::asset('resources/img/logo/vinylcollector-white-disc.png') }}"
        type="image/x-icon">
    <title>@yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app" class="d-flex flex-column min-vh-100">

        @include('layouts.partials.header-nav')

        <main class="flex-grow-1 overflow-auto">
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>
</body>

</html>
