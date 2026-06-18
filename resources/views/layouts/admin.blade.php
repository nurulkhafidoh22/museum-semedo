<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script defer
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
        </script>
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

<body class="bg-[#f5f7fb] font-[Figtree] overflow-x-hidden">

    <div
        x-data="{ sidebarOpen:false }"
        class="flex min-h-screen">

        <!-- OVERLAY -->
        <div
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen=false"
            class="fixed inset-0 bg-black/50 z-40 lg:hidden">
        </div>

<!-- ================= SIDEBAR ================= -->
<aside
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed top-0 left-0 z-50
           h-screen w-64 lg:w-72
           bg-[#0b1f21]
           text-white
           flex flex-col

           overflow-y-auto

           border-r border-white/10
           transition-transform duration-300
           lg:translate-x-0">

    <!-- ================================= -->
    <!-- BRAND -->
    <!-- ================================= -->

    <div class="px-6 pt-8 pb-6">

        <div class="flex items-center gap-4">

            <div class="flex items-center justify-center">

                <img src="/images/museum-icon.png"
                    class="h-8 lg:h-10 w-auto">

            </div>

            <div>

                <h2 class="font-bold text-white text-base lg:text-lg leading-tight">
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

            <!-- PETUGAS -->
            <a href="{{ route('admin.petugas.index') }}"
                class="group flex items-center gap-3 px-4 py-3
                text-[14px]
                rounded-xl transition-all

                {{ request()->routeIs('admin.petugas*')
                ? 'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg'
                : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">

                <i data-lucide="user-cog"
                    class="w-4 h-4"></i>

                Petugas

            </a>

        </nav>

    </div>

    <!-- ================================= -->
    <!-- FOOTER -->
    <!-- ================================= -->

    <div class="mt-auto p-6">

        <!-- PROFILE -->
        <a href="{{ route('profile.edit') }}"
            class="block
            bg-white/5
            border border-white/10
            rounded-2xl
            p-3.5
            mb-6
            hover:bg-white/10
            transition-all duration-300">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10
                    rounded-full
                    bg-cyan-500/15
                    flex items-center justify-center
                    text-cyan-300
                    font-semibold">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>

                <div>

                    <p class="text-sm font-medium text-white">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-xs text-gray-400">
                        Pengaturan Akun
                    </p>

                </div>

            </div>

        </a>


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
<div class="flex-1 flex flex-col lg:ml-72 main-wrapper">

    <div class="lg:hidden sticky top-0 z-40
        bg-white border-b border-gray-200
        px-4 py-3 flex items-center justify-between">

        <button
            @click="sidebarOpen = true"
            class="p-2 rounded-lg hover:bg-gray-100">

            <i data-lucide="menu"
                class="w-6 h-6">
            </i>

        </button>

        <span class="font-semibold text-[#0f2a2c]">
            Museum Semedo
        </span>

    </div>

    <!-- ================= CONTENT ================= -->
    <main class="flex-1 overflow-y-auto overflow-x-hidden">
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