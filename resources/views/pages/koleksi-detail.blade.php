<x-app-layout>

<!-- ========================================= -->
<!-- HERO DETAIL PREMIUM -->
<!-- ========================================= -->
<section class="relative overflow-hidden
    bg-gradient-to-br
    from-[#062b30]
    via-[#0d3b43]
    to-[#14535d]
    text-white">

    <!-- ORNAMEN -->
    <div class="absolute top-0 left-0
        w-96 h-96 rounded-full
        bg-cyan-400/10 blur-3xl">
    </div>

    <div class="absolute bottom-0 right-0
        w-96 h-96 rounded-full
        bg-cyan-300/10 blur-3xl">
    </div>

    <div class="relative max-w-7xl mx-auto px-6 py-20">

        <!-- BREADCRUMB -->
        <div class="mb-8 text-sm text-white/60">

            <a href="/"
                class="hover:text-white transition">

                Beranda

            </a>

            <span class="mx-2">/</span>

            <a href="/koleksi"
                class="hover:text-white transition">

                Koleksi

            </a>

            <span class="mx-2">/</span>

            <span class="text-white">

                {{ $judul }}

            </span>

        </div>

        <div class="grid lg:grid-cols-2 gap-14 items-center">

            <!-- ================================= -->
            <!-- IMAGE -->
            <!-- ================================= -->
            <div class="relative">

                <!-- IMAGE -->
                <img src="{{ $gambar }}"
                    alt="{{ $judul }}"
                    class="w-full h-[500px]
                    object-cover rounded-[32px]
                    shadow-2xl">

                <!-- OVERLAY -->
                <div class="absolute inset-0
                    rounded-[32px]
                    bg-gradient-to-t
                    from-black/40
                    via-transparent
                    to-transparent">
                </div>

                <!-- NOMOR -->
                <div class="absolute top-6 right-6
                    w-14 h-14 rounded-full
                    bg-white/90 backdrop-blur-sm
                    flex items-center justify-center
                    text-lg font-bold text-gray-900">

                    01

                </div>

                <!-- LABEL -->
                <div class="absolute bottom-6 left-6
                    px-4 py-2 rounded-full
                    bg-white/90 backdrop-blur-sm
                    text-sm font-semibold text-gray-900">

                    Koleksi Museum Semedo

                </div>

            </div>


            <!-- ================================= -->
            <!-- CONTENT -->
            <!-- ================================= -->
            <div>

                <!-- BADGE -->
                <span class="inline-flex items-center
                    px-4 py-2 rounded-full
                    bg-white/10 border border-white/10
                    text-sm font-medium">

                    {{ $kategori }}

                </span>

                <!-- TITLE -->
                <h1 class="mt-6
                    text-4xl md:text-5xl
                    font-bold leading-tight">

                    {{ $judul }}

                </h1>

                <!-- DESC -->
                <p class="mt-6
                    text-white/80
                    leading-8 text-lg">

                    {{ $deskripsi }}

                </p>

                <!-- MINI INFO -->
                <div class="mt-10 flex flex-wrap gap-4">

                    <div class="px-5 py-3
                        rounded-2xl
                        bg-white/5
                        border border-white/10">

                        <p class="text-xs text-white/60 mb-1">

                            Periode

                        </p>

                        <p class="font-semibold">

                            {{ $periode }}

                        </p>

                    </div>

                    <div class="px-5 py-3
                        rounded-2xl
                        bg-white/5
                        border border-white/10">

                        <p class="text-xs text-white/60 mb-1">

                            Usia

                        </p>

                        <p class="font-semibold">

                            {{ $usia }}

                        </p>

                    </div>

                    <div class="px-5 py-3
                        rounded-2xl
                        bg-white/5
                        border border-white/10">

                        <p class="text-xs text-white/60 mb-1">

                            Lokasi

                        </p>

                        <p class="font-semibold">

                            {{ $lokasi }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ========================================= -->
<!-- COLLECTION STORY -->
<!-- ========================================= -->
<section class="relative bg-[#f8fafc] py-20 overflow-hidden">

    <!-- ORNAMEN -->
    <div class="absolute top-0 left-0
        w-[500px] h-[500px]
        bg-cyan-100/40
        rounded-full blur-3xl">
    </div>

    <div class="relative max-w-5xl mx-auto px-6">

        <!-- WRAPPER -->
        <div class="bg-white
            border border-gray-100
            rounded-[32px]
            shadow-sm
            overflow-hidden">

            <!-- ================================= -->
            <!-- INFORMASI -->
            <!-- ================================= -->
            <div class="p-8 md:p-10">

                <!-- HEADER -->
                <div class="mb-10">

                    <span class="text-sm font-medium text-[#0f766e]">

                        Informasi Koleksi

                    </span>

                    <h2 class="mt-2
                        text-2xl md:text-3xl
                        font-bold text-gray-900">

                        Detail Artefak & Temuan

                    </h2>

                </div>


                <!-- GRID -->
                <div class="grid
                    sm:grid-cols-2
                    lg:grid-cols-4
                    gap-5">

                    <!-- PERIODE -->
                    <div class="rounded-2xl
                        bg-[#f8fafc]
                        border border-gray-100
                        p-5">

                        <!-- ICON -->
                        <div class="w-12 h-12
                            rounded-xl
                            bg-cyan-100
                            flex items-center justify-center
                            mb-4">

                            <i data-lucide="calendar-range"
                                class="w-6 h-6 text-[#0f766e]">
                            </i>

                        </div>

                        <p class="text-sm text-gray-500 mb-1">

                            Periode

                        </p>

                        <h3 class="text-lg font-semibold text-gray-900">

                            {{ $periode }}

                        </h3>

                    </div>


                    <!-- USIA -->
                    <div class="rounded-2xl
                        bg-[#f8fafc]
                        border border-gray-100
                        p-5">

                        <!-- ICON -->
                        <div class="w-12 h-12
                            rounded-xl
                            bg-cyan-100
                            flex items-center justify-center
                            mb-4">

                            <i data-lucide="hourglass"
                                class="w-6 h-6 text-[#0f766e]">
                            </i>

                        </div>

                        <p class="text-sm text-gray-500 mb-1">

                            Usia Koleksi

                        </p>

                        <h3 class="text-lg font-semibold text-gray-900 leading-relaxed">

                            {{ $usia }}

                        </h3>

                    </div>


                    <!-- LOKASI -->
                    <div class="rounded-2xl
                        bg-[#f8fafc]
                        border border-gray-100
                        p-5">

                        <!-- ICON -->
                        <div class="w-12 h-12
                            rounded-xl
                            bg-cyan-100
                            flex items-center justify-center
                            mb-4">

                            <i data-lucide="map-pin"
                                class="w-6 h-6 text-[#0f766e]">
                            </i>

                        </div>

                        <p class="text-sm text-gray-500 mb-1">

                            Lokasi Temuan

                        </p>

                        <h3 class="text-lg font-semibold text-gray-900 leading-relaxed">

                            {{ $lokasi }}

                        </h3>

                    </div>


                    <!-- KATEGORI -->
                    <div class="rounded-2xl
                        bg-[#f8fafc]
                        border border-gray-100
                        p-5">

                        <!-- ICON -->
                        <div class="w-12 h-12
                            rounded-xl
                            bg-cyan-100
                            flex items-center justify-center
                            mb-4">

                            <i data-lucide="archive"
                                class="w-6 h-6 text-[#0f766e]">
                            </i>

                        </div>

                        <p class="text-sm text-gray-500 mb-1">

                            Kategori

                        </p>

                        <h3 class="text-lg font-semibold text-gray-900 leading-relaxed">

                            {{ $kategori }}

                        </h3>

                    </div>

                </div>

            </div>


            <!-- DIVIDER -->
            <div class="border-t border-gray-100"></div>


            <!-- ================================= -->
            <!-- DESKRIPSI -->
            <!-- ================================= -->
            <div class="p-8 md:p-10">

                <div class="max-w-3xl">

                    <!-- LABEL -->
                    <span class="text-sm font-medium text-[#0f766e]">

                        Deskripsi Koleksi

                    </span>

                    <!-- TITLE -->
                    <h2 class="mt-2
                        text-2xl md:text-3xl
                        font-bold text-gray-900">

                        Tentang Artefak

                    </h2>

                    <!-- CONTENT -->
                    <div class="mt-8
                        space-y-6
                        text-gray-700
                        text-base
                        leading-8">

                        <p class="text-justify">

                            {{ $deskripsi_lengkap_1 }}

                        </p>

                        <p class="text-justify">

                            {{ $deskripsi_lengkap_2 }}

                        </p>

                    </div>

                </div>

            </div>


            <!-- DIVIDER -->
            <div class="border-t border-gray-100"></div>


            <!-- ================================= -->
            <!-- KONTEKS -->
            <!-- ================================= -->
            <div class="p-8 md:p-10">

                <div class="max-w-3xl">

                    <!-- LABEL -->
                    <span class="text-sm font-medium text-[#0f766e]">

                        Konteks Sejarah

                    </span>

                    <!-- TITLE -->
                    <h2 class="mt-2
                        text-2xl md:text-3xl
                        font-bold text-gray-900">

                        Latar Belakang Prasejarah

                    </h2>

                    <!-- TEXT -->
                    <div class="mt-8">

                        <p class="
                            text-base
                            leading-9
                            text-gray-700
                            text-justify">

                            {{ $konteks }}

                        </p>

                    </div>

                </div>

            </div>
            
        </div>

    </div>

</section>

<!-- ========================================= -->
<!-- RELATED COLLECTION -->
<!-- ========================================= -->
<section class="bg-[#f8fafc] py-20">

    <div class="max-w-6xl mx-auto px-6">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row
            md:items-end md:justify-between
            gap-4 mb-12">

            <div>

                <span class="text-sm font-medium text-[#0f766e]">

                    Koleksi Lainnya

                </span>

                <h2 class="mt-2 text-3xl font-bold text-gray-900">

                    Jelajahi Koleksi Museum

                </h2>

            </div>

            <p class="text-gray-500 max-w-xl">

                Temukan berbagai koleksi fosil,
                artefak batu, dan peninggalan
                prasejarah lainnya dari Situs Semedo.

            </p>

        </div>


        <!-- GRID -->
        <div class="grid md:grid-cols-3 gap-8">

            @foreach($related as $item)

            <div class="group bg-white
                rounded-[28px]
                border border-gray-100
                overflow-hidden
                shadow-sm
                hover:shadow-2xl
                hover:-translate-y-2
                transition-all duration-500">

                <!-- IMAGE -->
                <div class="relative overflow-hidden">

                    <img src="{{ asset('storage/' . $item->gambar) }}"
                        alt="{{ $item->judul }}"
                        class="w-full h-56 object-cover
                        group-hover:scale-110
                        transition duration-700">

                    <!-- OVERLAY -->
                    <div class="absolute inset-0
                        bg-gradient-to-t
                        from-black/50
                        via-transparent
                        to-transparent">
                    </div>

                    <!-- BADGE -->
                    <span class="absolute bottom-4 left-4
                        px-3 py-1 rounded-full
                        bg-white/90 backdrop-blur-sm
                        text-xs font-medium text-gray-800">

                        {{ $item->kategori }}

                    </span>

                </div>

                <!-- CONTENT -->
                <div class="p-6">

                    <h3 class="text-xl font-semibold
                        text-gray-900 mb-3">

                        {{ $item->judul }}

                    </h3>

                    <p class="text-sm text-gray-600
                        leading-7 mb-5">

                        {{ $item->deskripsi }}

                    </p>

                    <a href="{{ route('koleksi.detail', $item->slug) }}"
                        class="inline-flex items-center gap-2
                        text-[#0f766e]
                        font-medium text-sm">

                        Lihat Detail

                        <span class="
                            group-hover:translate-x-1
                            transition">

                            →

                        </span>

                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

<!-- NAVIGASI -->
<section class="bg-white py-12">

  <div class="max-w-4xl mx-auto px-6 text-center">

    <a href="/koleksi"
       class="inline-block px-8 py-3
              bg-[#0f2a2c] text-white
              rounded-full
              font-semibold
              border border-[#0f2a2c]
              transition duration-300
              hover:bg-white
              hover:text-[#0f2a2c]">
      ← Kembali ke Koleksi
    </a>

  </div>

</section>

</x-app-layout>