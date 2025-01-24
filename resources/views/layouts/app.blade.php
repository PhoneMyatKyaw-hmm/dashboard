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
    {{-- <div class="flex gap-8 bg-white dark:bg-gray-900">
        <x-side-bar class="min-w-fit flex-grow-0 flex-shrink-0 hidden md:block"/>
        <main class="mt-4 px-4">
            <div class="block sm:absolute top-5 right-8 order-1">
                <x-dark-mode-toggle size="4" />
            </div>
            {{ $slot }}
            <x-footer />
        </main>
    </div> --}}
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
            <x-side-bar></x-side-bar>
            <!-- Page Content -->
            <div class="flex-1 md:ml-64">
                <x-nav-bar></x-nav-bar>
                <main class="mt-20">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>
