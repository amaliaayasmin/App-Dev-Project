<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('APP.name', 'Oh! My Merits') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background: url('{{ asset('img/UTM_bg.jpg') }}') no-repeat center center fixed;
                background-size: cover;
                color: #FFFFFF;
                position: relative;
                min-height: 100vh;
            }

            /* Gray overlay */
            .bg-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5); /* semi-transparent gray */
                z-index: 1; /* Make sure the overlay is on top of the background image */
            }

            /* Content needs to be on top of the overlay */
            .content-wrapper {
                position: relative;
                z-index: 2;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Gray Transparent Overlay -->
        <div class="bg-overlay"></div>

        <div class="content-wrapper min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
