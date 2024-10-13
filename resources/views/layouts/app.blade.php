<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icons" href="images/logo2.png">

    <title>{{ config('app.name', 'Motocare') }}</title>

    <link rel="icon" type="image/x-icon" href="/images/logo2.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- GOOGLE ICONS --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    {{-- SWEET ALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- PARALAX --}}
    <!-- Jarallax -->
    <link href="dist/jarallax.css" rel="stylesheet" />
    <script src="dist/jarallax.js"></script>
    <script src="dist/jarallax-video.js"></script>
    <!-- Plausible -->
    <script defer async data-domain="jarallax.nkdev.info" src="https://plausible.io/js/plausible.outbound-links.js">
    </script>
    <script>
        window.plausible = window.plausible || function() {
            (window.plausible.q = window.plausible.q || []).push(arguments)
        }
    </script>


    <!-- Scripts -->
    @vite(['resources/css/parallax.css', 'resources/js/app.js'])

</head>

<body class="antialiased bg-gray-950">
    <x-loader></x-loader>
    <x-navbar></x-navbar>
    {{ $slot }}
    <x-footer></x-footer>
</body>

</html>
