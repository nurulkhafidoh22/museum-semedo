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

    <!-- Scripts / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Print CSS -->
    <style>
    @media print {
        .no-print, nav, header, .navigation { display: none !important; }
        body { background: white !important; }
    }
    </style>
</head>

<body class="font-sans antialiased bg-transparent">

    <div>

        <!-- Navbar -->
        @if(request()->routeIs('home'))
            <div class="no-print">
                @include('layouts.navigation')
            </div>
        @endif

        <!-- Main Content -->
        <main>
            @isset($slot)
                {{ $slot }}
            @endisset

            @yield('content')
        </main>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.lucide) {
                lucide.createIcons();
            }
        });
        </script>

        @stack('scripts')

        </body>
        </html>
    @stack('scripts')

</body>
</html>