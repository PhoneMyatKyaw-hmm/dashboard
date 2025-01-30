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
    <div x-data="{ open: true }" x-cloak class="min-h-screen bg-slate-100 dark:bg-gray-900 flex">
        <x-sidebar x-cloak ::class="open ? 'w-64' : 'w-[4.5rem]' "
            class="fixed top-0 left-0 z-40 h-screen transition-transform -translate-x-full md:translate-x-0 "></x-sidebar>

        <!-- Page Content -->
        <div class="flex-1" x-cloak :class="open ? 'md:ml-64' : 'ml-[4.5rem]'">
            <main class="my-2 mr-4">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>

</html>