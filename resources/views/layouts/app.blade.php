<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=
                open-sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i
                |poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i
                |roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="antialiased bg-gray-100">
    <x-sidebar>
        <!-- Page content here -->
        {{ $slot }}
    </x-sidebar>
    <div id="notif" class="fixed top-12 right-0">
        <x-alert-success />
        <x-alert-primary />
        <x-alert-danger />
    </div>
    @livewireScripts
</body>

</html>
