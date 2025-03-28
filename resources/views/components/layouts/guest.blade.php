<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen flex bg-slate-100">
            <div class="bg-slate-100 w-7/12 h-100 flex justify-center items-center my-auto">
                <img class="h-[22rem]" src="{{ asset('images/login-logo-2.png') }}" alt="Decorative illustration"/>
            </div>
            <div class="bg-white w-5/12 h-100 rounded-xl m-2 flex flex-col">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
