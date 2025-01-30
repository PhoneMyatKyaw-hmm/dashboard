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

    <div x-cloak x-data="{ open: true }" class="flex min-h-screen overflow-hidden bg-slate-100 dark:bg-gray-900">
        <x-sidebar ::class="!open ? 'w-[4.5rem]' : 'w-64'"
            class="mt-2 fixed top-0 left-0 z-40 h-screen transition-transform -translate-x-full md:translate-x-0 "></x-sidebar>

        <!-- Page Content -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-hidden" x-cloak
            :class="open ? 'md:ml-64' : 'ml-[4.5rem]'">

            <div class="bg-white m-4 h-[calc(100vh-2rem)] overflow-x-hidden overflow-y-auto shadow-sm md:rounded-3xl">
                <main class="grow">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </div>
</body>

</html>