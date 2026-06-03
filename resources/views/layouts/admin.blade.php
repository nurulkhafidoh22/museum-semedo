<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Admin — Museum Semedo</title>

    @vite('resources/css/app.css')

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    {{-- ================= PRINT MODE ================= --}}
    <style>
    @media print {

        /* Hilangkan sidebar & topbar */
        aside, header {
            display: none !important;
        }

        /* Hilangkan tombol */
        .no-print {
            display: none !important;
        }

        /* HILANGKAN SCROLL */
        main {
            overflow: visible !important;
            height: auto !important;
        }

        .overflow-y-auto {
            overflow: visible !important;
        }

        /* Full width */
        .main-wrapper {
            margin-left: 0 !important;
            width: 100% !important;
        }

        body {
            background: white !important;
        }

        /* shadow */
        .shadow-sm {
            box-shadow: none !important;
        }

        /* ================= */
        /* FIX GRAFIK */
        /* ================= */

        canvas {
            max-height: 300px !important;
            page-break-inside: avoid;
        }

        /* ================= */
        /* SECTION BREAK */
        /* ================= */

        .print-section {
            page-break-inside: avoid;
            margin-bottom: 20px;
        }

        .page-break {
            page-break-before: always;
        }

    }
    </style>

</head>

<body class="bg-[#f5f7fb] font-[Figtree]">

<div class="flex min-h-screen">

<!-- ================= SIDEBAR ================= -->
<aside class="fixed top-0 left-0 h-screen w-72
    bg-[#0b1f21]
    text-white
    flex flex-col
    border-r border-white/10">

    <!-- ================================= -->
    <!-- BRAND -->
    <!-- ================================= -->

    <div class="px-6 pt-8 pb-6">

        <div class="flex items-center gap-4">

            <div class="flex items-center justify-center">

                <img src="/images/museum-icon.png"
                    class="h-10 w-auto">

            </div>

            <div>

                <h2 class="font-bold text-white text-lg leading-tight">
                    Museum Semedo
                </h2>

                <p class="text-xs text-gray-400">
                    Visitor Analytics System
                </p>

            </div>

        </div>

    </div>

    <!-- ================================= -->
    <!-- MENU -->
    <!-- ================================= -->

    <div class="px-6">

        <p class="text-[11px]
            uppercase tracking-[0.25em]
            text-gray-500 mb-4">

            Main Menu

        </p>

        <nav class="space-y-2">

            <!-- DASHBOARD -->
            <a href="{{ route('admin.dashboard') }}"
                class="group flex items-center gap-3 px-4 py-3
                text-[14px]
                rounded-xl transition-all

                {{ request()->routeIs('admin.dashboard*')
                ? 'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg'
                : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">

                <i data-lucide="layout-dashboard"
                    class="w-4 h-4"></i>

                Dashboard

            </a>

            <!-- PENGUNJUNG -->
            <a href="{{ route('admin.pengunjung') }}"
                class="group flex items-center gap-3 px-4 py-3
                text-[14px]
                rounded-xl transition-all

                {{ request()->routeIs('admin.pengunjung*')
                ? 'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg'
                : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">

                <i data-lucide="users"
                    class="w-4 h-4"></i>

                Data Pengunjung

            </a>

            <!-- ANALITIK -->
            <a href="{{ route('admin.analytics') }}"
                class="group flex items-center gap-3 px-4 py-3
                text-[14px]
                rounded-xl transition-all

                {{ request()->routeIs('admin.analytics*')
                ? 'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg'
                : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">

                <i data-lucide="bar-chart-3"
                    class="w-4 h-4"></i>

                Analitik Pengunjung

            </a>

            <!-- VALIDASI -->
            <a href="{{ route('admin.validasi') }}"
                class="group flex items-center gap-3 px-4 py-3
                text-[14px]
                rounded-xl transition-all

                {{ request()->routeIs('admin.validasi*')
                ? 'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg'
                : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">

                <i data-lucide="ticket"
                    class="w-4 h-4"></i>

                Validasi Tiket

            </a>

            <!-- STATISTIK -->
            <a href="{{ route('admin.statistik') }}"
                class="group flex items-center gap-3 px-4 py-3
                text-[14px]
                rounded-xl transition-all

                {{ request()->routeIs('admin.statistik*')
                ? 'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg'
                : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">

                <i data-lucide="pie-chart"
                    class="w-4 h-4"></i>

                Statistik Tiket

            </a>

            <!-- LAPORAN -->
            <a href="{{ route('admin.laporan') }}"
                class="group flex items-center gap-3 px-4 py-3
                text-[14px]
                rounded-xl transition-all

                {{ request()->routeIs('admin.laporan*')
                ? 'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg'
                : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">

                <i data-lucide="file-text"
                    class="w-4 h-4"></i>

                Laporan

            </a>

        </nav>

    </div>

    <!-- ================================= -->
    <!-- FOOTER -->
    <!-- ================================= -->

    <div class="mt-auto p-6">

        <!-- PROFILE -->
        <div class="bg-white/5
            border border-white/10
            rounded-2xl
            p-3.5
            mb-6">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10
                    rounded-full
                    bg-cyan-500/15
                    flex items-center justify-center
                    text-cyan-300
                    font-semibold">

                    A

                </div>

                <div>

                    <p class="text-sm font-medium text-white">
                        Administrator
                    </p>

                    <p class="text-xs text-gray-400">
                        Museum Semedo
                    </p>

                </div>

            </div>

        </div>

        <!-- LOGOUT -->
        <form method="POST"
            action="{{ route('logout') }}">

            @csrf

            <button type="submit"

                class="w-full flex items-center
                justify-center gap-2

                px-4 py-3

                rounded-xl

                bg-white/5
                border border-white/10

                text-gray-300
                font-medium

                hover:bg-red-500/10
                hover:text-red-300
                hover:border-red-500/20

                transition-all duration-300">

                <i data-lucide="log-out"
                    class="w-4 h-4"></i>

                Logout

            </button>

        </form>

    </div>

</aside>
<!-- ================= MAIN ================= -->
<div class="flex-1 flex flex-col ml-72 main-wrapper">

    <!-- ================= CONTENT ================= -->
    <main class="flex-1 overflow-y-auto">
        @yield('content')
    </main>

</div>
</div>

<!-- ================= SCRIPT ================= -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1"></script>

<script>
function toggleDropdown() {
    const menu = document.getElementById("dropdownMenu");
    if (menu) {
        menu.classList.toggle("hidden");
    }
}

document.addEventListener('click', function(e) {
    const dropdown = document.getElementById("dropdownMenu");

    if (!dropdown) return;

    if (!e.target.closest('#dropdownMenu') && !e.target.closest('button')) {
        dropdown.classList.add("hidden");
    }
});
</script>

@stack('scripts')

<form id="autoLogoutForm" method="POST" action="{{ route('logout') }}">
    @csrf
</form>

<script>
let idleTime = 0;
let warningShown = false;

const MAX_IDLE = 15;
const WARNING_TIME = 14;

setInterval(timerIncrement, 60000);

['click','mousemove','keypress','scroll'].forEach(event => {
    document.addEventListener(event, () => {
        idleTime = 0;
        warningShown = false;
    });
});

function timerIncrement() {
    idleTime++;

    if (idleTime === WARNING_TIME && !warningShown) {
        warningShown = true;

        if (confirm("Session akan habis dalam 1 menit. Tetap lanjutkan?")) {
            idleTime = 0;
            keepAlive();
        }
    }

    if (idleTime >= MAX_IDLE) {
        document.getElementById('autoLogoutForm').submit();
    }
}

function keepAlive() {
    fetch("/ping-session");
}
</script>

<script>
lucide.createIcons();
</script>
</body>
</html>