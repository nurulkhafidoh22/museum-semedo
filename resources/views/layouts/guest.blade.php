<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Museum Semedo') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased overflow-x-hidden">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-6
            bg-gradient-to-br
            from-slate-50
            via-white
            to-cyan-50">
            <div>
                <a href="/">
                    <img
                        src="{{ asset('images/logo-login.png') }}"
                        alt="Museum Situs Semedo"
                        class="w-20 h-20 sm:w-24 sm:h-24 object-contain"
                    >
                </a>
            </div>

            <div class="w-full max-w-md
                mt-6
                px-5 sm:px-6
                py-5
                bg-white
                shadow-md
                overflow-hidden
                rounded-2xl">       
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
