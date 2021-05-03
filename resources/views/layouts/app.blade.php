<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireScripts()

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @livewireStyles()
</head>
<body class="w-screen">
    @guest
        {{ $slot }}
    @else
    <div class="flex flex-row">
        <div class="sidebar">
            @include('livewire.sidebar')
        </div>
        <div class="w-full bg-gray-100 ml-20 lg:ml-64 ease-in-out duration-700">
            {{ $slot }}
        </div>
    </div>
    @endguest
</body>
</html>