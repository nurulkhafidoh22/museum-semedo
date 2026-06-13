<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Pengaturan Website - Museum Semedo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>

</head>

<body class="bg-[#f5f7fb] font-[Figtree]">

<div class="flex min-h-screen">

    <!-- ===================================== -->
    <!-- SIDEBAR -->
    <!-- ===================================== -->

    <aside class="fixed top-0 left-0 h-screen w-72
        bg-[#0b1f21]
        text-white
        flex flex-col
        border-r border-white/10">

        <!-- ===================================== -->
        <!-- BRAND -->
        <!-- ===================================== -->

        <div class="px-6 pt-8 pb-6">

            <div class="flex items-center gap-4">

                <img
                    src="/images/museum-icon.png"
                    alt="Museum Semedo"
                    class="h-10 w-auto">

                <div>

                    <h2 class="font-bold text-white text-lg leading-tight">
                        Museum Semedo
                    </h2>

                    <p class="text-xs text-gray-400">
                        Website Management
                    </p>

                </div>

            </div>

        </div>

        <!-- ===================================== -->
        <!-- MENU -->
        <!-- ===================================== -->

        <div class="px-6">

            <p class="text-[11px]
                uppercase
                tracking-[0.25em]
                text-gray-500
                mb-4">

                Pengaturan Website

            </p>

            <nav class="space-y-2">

                <!-- BERANDA -->
                <a href="{{ route('admin.settings',['menu'=>'beranda']) }}"
                    @class([
                            'group flex items-center gap-3 px-4 py-3 text-[14px] rounded-xl transition-all',
                            'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg' => $menu == 'beranda',
                            'text-gray-300 hover:bg-white/5 hover:text-white' => $menu != 'beranda'
                    ])>

                    <i data-lucide="house" class="w-4 h-4"></i>

                    Beranda

                </a>

                <!-- TENTANG -->
                <a href="{{ route('admin.settings',['menu'=>'tentang']) }}"
                    @class([
                            'group flex items-center gap-3 px-4 py-3 text-[14px] rounded-xl transition-all',
                            'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg' => $menu == 'tentang',
                            'text-gray-300 hover:bg-white/5 hover:text-white' => $menu != 'tentang'
                    ])>

                    <i data-lucide="info" class="w-4 h-4"></i>

                    Tentang

                </a>

                <!-- INFORMASI -->
                <a href="{{ route('admin.settings',['menu'=>'informasi']) }}"
                    @class([
                            'group flex items-center gap-3 px-4 py-3 text-[14px] rounded-xl transition-all',
                            'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg' => $menu == 'informasi',
                            'text-gray-300 hover:bg-white/5 hover:text-white' => $menu != 'informasi'
                    ])>

                    <i data-lucide="file-text" class="w-4 h-4"></i>

                    Informasi

                </a>

                <!-- TIKET -->
                <a href="{{ route('admin.settings',['menu'=>'tiket']) }}"
                    @class([
                            'group flex items-center gap-3 px-4 py-3 text-[14px] rounded-xl transition-all',
                            'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg' => $menu == 'tiket',
                            'text-gray-300 hover:bg-white/5 hover:text-white' => $menu != 'tiket'
                    ])>

                    <i data-lucide="ticket" class="w-4 h-4"></i>

                    Tiket

                </a>

                <!-- KOLEKSI -->
                <a href="{{ route('admin.settings',['menu'=>'koleksi']) }}"
                    @class([
                            'group flex items-center gap-3 px-4 py-3 text-[14px] rounded-xl transition-all',
                            'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg' => $menu == 'koleksi',
                            'text-gray-300 hover:bg-white/5 hover:text-white' => $menu != 'koleksi'
                    ])>

                    <i data-lucide="gallery-horizontal" class="w-4 h-4"></i>

                    Koleksi

                </a>

                <!-- FOOTER -->
                <a href="{{ route('admin.settings',['menu'=>'footer']) }}"
                    @class([
                            'group flex items-center gap-3 px-4 py-3 text-[14px] rounded-xl transition-all',
                            'bg-white/10 border-l-4 border-cyan-400 text-white shadow-lg' => $menu == 'footer',
                            'text-gray-300 hover:bg-white/5 hover:text-white' => $menu != 'footer'
                    ])>

                    <i data-lucide="layout-template" class="w-4 h-4"></i>

                    Footer

                </a>

            </nav>

        </div>

    <!-- ===================================== -->
    <!-- FOOTER SIDEBAR -->
    <!-- ===================================== -->

    <div class="mt-auto p-6">

        <!-- PROFILE -->

        <a href="{{ route('profile.edit') }}"
        class="block
        bg-white/5
        border border-white/10
        rounded-2xl
        p-3.5
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

        <!-- KEMBALI KE DASHBOARD -->

        <a href="{{ route('admin.dashboard') }}"
        class="mt-4 w-full flex items-center
        justify-center gap-2

        px-4 py-3

        rounded-xl

        bg-white/5
        border border-white/10

        text-gray-300
        font-medium

        hover:bg-cyan-500/10
        hover:text-cyan-300
        hover:border-cyan-500/20

        transition-all duration-300">

            <i data-lucide="arrow-left"
            class="w-4 h-4"></i>

            Kembali ke Dashboard

        </a>

    </div>

    </aside>

    <!-- ===================================== -->
    <!-- CONTENT -->
    <!-- ===================================== -->

    <div class="flex-1 ml-72">

        <main class="p-8">

            @yield('content')

        </main>

    </div>

</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>