<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles()
</head>
<body>
    @auth
        <div class="text-gray-700 bg-white ">
            <div class="flex flex-col flex-wrap p-5 mx-auto border-b md:items-center md:flex-row">
                <a href="./index.html" class="pr-2 lg:pr-8 lg:px-6 focus:outline-none">
                    <div class="inline-flex items-center">
                        <div class="w-2 h-2 p-2 mr-2 rounded-full bg-gradient-to-tr from-cyan-400 to-lightBlue-500">
                        </div>
                        <h2
                            class="font-semibold tracking-tighter text-gray-500 transition duration-1000 ease-in-out transform text-bold lg:mr-8">
                            {{ config('app.name', 'Laravel') }}
                        </h2>
                    </div>
                </a>
                <nav class="flex flex-wrap items-center justify-center text-base md:ml-auto ">
                    {{-- <a href="#" class="mr-5 text-sm font-semibold text-gray-600 hover:text-gray-800">Pricing</a> --}}
                </nav>
                <a
                    class="items-center px-8 py-2 font-semibold text-white transition duration-500 ease-in-out transform bg-black rounded-lg hover:bg-gray-900 focus:ring focus:outline-none" href="{{ route('logout') }}">
                    Logout
                </a>
            </div>
        </div>
        <div
            class="container w-full h-full m-4 mx-auto my-2 text-center flex items-center justify-center py-20">
            <p class="text-gray-500 text-md">
                {{ $slot }}
            </p>
        </div>
    @else
        <div class="w-screen h-screen">
            {{ $slot }}
        </div>
    @endauth
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireScripts()
</body>
</html>
