<x-app-layout>

<!-- ========================================= -->
<!-- HERO KOLEKSI PREMIUM -->
<!-- ========================================= -->
<section class="relative overflow-hidden bg-gradient-to-br
    from-[#062b30]
    via-[#0f3c44]
    to-[#14535d]
    text-white">

    <!-- ORNAMEN -->
    <div class="absolute top-0 left-0
        w-[420px] h-[420px]
        bg-cyan-400/10 blur-3xl rounded-full">
    </div>

    <div class="absolute bottom-0 right-0
        w-[420px] h-[420px]
        bg-cyan-300/10 blur-3xl rounded-full">
    </div>

    <!-- GRID LINE(garis kotak) -->
    <div class="absolute inset-0 opacity-[0.03]"
        style="
            background-image:
            linear-gradient(to right, white 1px, transparent 1px),
            linear-gradient(to bottom, white 1px, transparent 1px);
            background-size: 80px 80px;
        ">
    </div>

    <div class="relative max-w-6xl mx-auto px-6 py-24 lg:py-28">

        <!-- HEADER -->
        <div class="text-center">

            <!-- BADGE -->
            <span class="inline-flex items-center
                px-4 py-2 rounded-full
                bg-white/10
                border border-white/10
                backdrop-blur-sm
                text-sm font-medium">

                Koleksi Unggulan Museum

            </span>

            <!-- TITLE -->
            <h1 class="mt-6
                text-4xl md:text-5xl lg:text-6xl
                font-bold leading-tight tracking-tight">

                Warisan Prasejarah

                <span class="block text-cyan-300">
                    Museum Semedo
                </span>

            </h1>

            <!-- DESCRIPTION -->
            <p class="mt-6 max-w-3xl mx-auto
                text-base md:text-lg
                text-white/80
                leading-8">

                Jelajahi berbagai fosil vertebrata,
                artefak prasejarah, dan temuan paleoantropologi
                yang menjadi bagian penting perjalanan kehidupan
                manusia purba di Situs Semedo, Kabupaten Tegal.

            </p>

        </div>

        <!-- INFORMASI -->
        <div class="mt-14 grid
            grid-cols-2 md:grid-cols-4
            gap-5 max-w-5xl mx-auto">

            <!-- ITEM -->
            <div class="rounded-3xl
                border border-white/10
                bg-white/[0.05]
                backdrop-blur-sm
                p-6 text-center
                transition duration-300
                hover:bg-white/[0.08]">

                <div class="text-3xl font-semibold tracking-tight">
                    ±1 Juta
                </div>

                <div class="text-sm text-white/70 mt-2">
                    Tahun Lalu
                </div>

            </div>

            <!-- ITEM -->
            <div class="rounded-3xl
                border border-white/10
                bg-white/[0.05]
                backdrop-blur-sm
                p-6 text-center
                transition duration-300
                hover:bg-white/[0.08]">

                <div class="text-3xl font-semibold tracking-tight">
                    Pleistosen
                </div>

                <div class="text-sm text-white/70 mt-2">
                    Periode Utama
                </div>

            </div>

            <!-- ITEM -->
            <div class="rounded-3xl
                border border-white/10
                bg-white/[0.05]
                backdrop-blur-sm
                p-6 text-center
                transition duration-300
                hover:bg-white/[0.08]">

                <div class="text-3xl font-semibold tracking-tight">
                    Vertebrata
                </div>

                <div class="text-sm text-white/70 mt-2">
                    Fosil Dominan
                </div>

            </div>

            <!-- ITEM -->
            <div class="rounded-3xl
                border border-white/10
                bg-white/[0.05]
                backdrop-blur-sm
                p-6 text-center
                transition duration-300
                hover:bg-white/[0.08]">

                <div class="text-3xl font-semibold tracking-tight">
                    Semedo
                </div>

                <div class="text-sm text-white/70 mt-2">
                    Situs Prasejarah
                </div>

            </div>

        </div>

    </div>

</section>

<!-- ========================================= -->
<!-- FILTER KOLEKSI -->
<!-- ========================================= -->
<section class="bg-[#f8fafc] pt-8 pb-4">

    <div class="max-w-6xl mx-auto px-6">

        <div class="flex flex-col lg:flex-row
            lg:items-center lg:justify-between
            gap-6">

            <!-- LEFT -->
            <div>

                <p class="text-sm font-medium text-[#0f766e] mb-2">
                    Kategori Koleksi
                </p>

                <h2 class="text-3xl md:text-[32px]
                    font-semibold tracking-tight
                    text-[#0f172a] leading-tight">

                    Jelajahi Berdasarkan Kategori

                </h2>

                <p class="text-sm text-gray-500 mt-3 max-w-xl leading-7">

                    Sebagian koleksi unggulan Museum Semedo
                    ditampilkan sebagai media edukasi digital
                    untuk memperkenalkan warisan prasejarah Indonesia.

                </p>

            </div>

            <!-- RIGHT -->
            <div class="flex flex-wrap gap-3">

                <!-- SEMUA -->
                <a href="{{ route('koleksi') }}"
                    class="px-5 py-2.5 rounded-full
                    text-sm font-medium
                    border transition-all duration-300

                    {{ !$kategori
                        ? 'bg-[#0f766e] text-white border-[#0f766e] shadow-md shadow-[#0f766e]/20'
                        : 'bg-white border-gray-200 text-gray-700 hover:border-[#0f766e] hover:text-[#0f766e] hover:bg-[#0f766e]/[0.03]' }}">

                    Semua

                </a>

                <!-- PALEONTOLOGI -->
                <a href="{{ route('koleksi', ['kategori' => 'paleontologi']) }}"
                    class="px-5 py-2.5 rounded-full
                    text-sm font-medium
                    border transition-all duration-300

                    {{ $kategori == 'paleontologi'
                        ? 'bg-[#0f766e] text-white border-[#0f766e] shadow-md shadow-[#0f766e]/20'
                        : 'bg-white border-gray-200 text-gray-700 hover:border-[#0f766e] hover:text-[#0f766e] hover:bg-[#0f766e]/[0.03]' }}">

                    Paleontologi

                </a>

                <!-- PALEOANTROPOLOGI -->
                <a href="{{ route('koleksi', ['kategori' => 'paleoantropologi']) }}"
                    class="px-5 py-2.5 rounded-full
                    text-sm font-medium
                    border transition-all duration-300

                    {{ $kategori == 'paleoantropologi'
                        ? 'bg-[#0f766e] text-white border-[#0f766e] shadow-md shadow-[#0f766e]/20'
                        : 'bg-white border-gray-200 text-gray-700 hover:border-[#0f766e] hover:text-[#0f766e] hover:bg-[#0f766e]/[0.03]' }}">

                    Paleoantropologi

                </a>

                <!-- ARTEFAK -->
                <a href="{{ route('koleksi', ['kategori' => 'artefak']) }}"
                    class="px-5 py-2.5 rounded-full
                    text-sm font-medium
                    border transition-all duration-300

                    {{ $kategori == 'artefak'
                        ? 'bg-[#0f766e] text-white border-[#0f766e] shadow-md shadow-[#0f766e]/20'
                        : 'bg-white border-gray-200 text-gray-700 hover:border-[#0f766e] hover:text-[#0f766e] hover:bg-[#0f766e]/[0.03]' }}">

                    Artefak

                </a>

            </div>

        </div>

    </div>

</section>

<!-- ========================================= -->
<!-- GRID KOLEKSI -->
<!-- ========================================= -->
<section class="bg-[#f8fafc] py-16">

    <div class="max-w-6xl mx-auto px-6">

        <!-- INFO FILTER -->
        @if($kategori)

        <div class="mb-8">

            <p class="text-sm text-gray-500">

                Menampilkan kategori:

                <span class="font-semibold text-[#0f766e]">

                    {{ $kategori }}

                </span>

            </p>

        </div>

        @endif


        <!-- GRID -->
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">

            @foreach($koleksi as $item)

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

                    <img
                        src="{{ asset('storage/' . $item->gambar) }}"
                        alt="{{ $item->judul }}"
                        class="w-full h-64 object-cover
                        group-hover:scale-110
                        transition duration-700"
                    >

                    <!-- OVERLAY -->
                    <div class="absolute inset-0
                        bg-gradient-to-t
                        from-black/50
                        via-transparent
                        to-transparent">
                    </div>

                    <!-- NOMOR -->
                    <div class="absolute top-4 right-4
                        w-10 h-10 rounded-full
                        bg-white/90 backdrop-blur-sm
                        flex items-center justify-center
                        text-sm font-bold text-gray-900">

                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}

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

                    <p class="text-gray-600
                        text-sm leading-7 mb-5">

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

<!-- CTA -->
<section class="relative overflow-hidden
    bg-gradient-to-br
    from-[#062b30]
    via-[#0d3b43]
    to-[#14535d]
    text-white py-24 mt-20">

    <!-- ORNAMEN -->
    <div class="absolute top-0 left-0
        w-96 h-96
        bg-cyan-400/10
        rounded-full blur-3xl">
    </div>

    <div class="absolute bottom-0 right-0
        w-96 h-96
        bg-cyan-300/10
        rounded-full blur-3xl">
    </div>

    <div class="relative max-w-6xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-14 items-center">

            <!-- ================================= -->
            <!-- LEFT -->
            <!-- ================================= -->
            <div>

                <span class="inline-flex items-center
                    px-4 py-2 rounded-full
                    bg-white/10 border border-white/10
                    text-sm font-medium">

                    Rencanakan Kunjungan Anda

                </span>

                <h2 class="mt-6
                    text-4xl md:text-5xl
                    font-bold leading-tight">

                    Saksikan Langsung
                    <span class="text-cyan-300">

                        Warisan Prasejarah

                    </span>

                    Indonesia

                </h2>

                <p class="mt-6
                    text-white/80
                    text-lg
                    leading-8
                    max-w-xl">

                    Nikmati pengalaman menjelajahi koleksi
                    fosil, artefak batu, dan peninggalan
                    prasejarah yang menjadi bagian penting
                    sejarah kehidupan manusia di Nusantara.

                </p>

                <!-- BUTTON -->
                <div class="mt-10 flex flex-wrap gap-4">

                    <a href="/informasi"
                        class="inline-flex items-center justify-center
                        px-8 py-3 rounded-full
                        bg-[#1ecad3]
                        text-[#062b30]
                        font-semibold
                        hover:bg-white
                        transition">

                        Informasi Kunjungan

                    </a>

                    <a href="{{ route('tiket.online') }}"
                        class="inline-flex items-center justify-center
                        px-8 py-3 rounded-full
                        border border-white/20
                        hover:bg-white/10
                        transition">

                        Pesan Tiket

                    </a>

                </div>

            </div>

            <!-- ================================= -->
            <!-- RIGHT -->
            <!-- ================================= -->
            <div>

                <div class="grid sm:grid-cols-2 gap-4">

                    <!-- ITEM -->
                    <div class="bg-white/5
                        border border-white/10
                        rounded-3xl p-6
                        backdrop-blur-sm">

                        <div class="text-cyan-300 text-xl mb-3">
                            ✓
                        </div>

                        <h4 class="font-semibold text-lg">
                            Koleksi Fosil
                        </h4>

                        <p class="text-sm text-white/70 mt-2">
                            Berbagai fosil vertebrata dan artefak
                            prasejarah khas Situs Semedo.
                        </p>

                    </div>

                    <!-- ITEM -->
                    <div class="bg-white/5
                        border border-white/10
                        rounded-3xl p-6
                        backdrop-blur-sm">

                        <div class="text-cyan-300 text-xl mb-3">
                            ✓
                        </div>

                        <h4 class="font-semibold text-lg">
                            Edukasi Interaktif
                        </h4>

                        <p class="text-sm text-white/70 mt-2">
                            Cocok untuk pelajar, mahasiswa,
                            maupun wisata keluarga.
                        </p>

                    </div>

                    <!-- ITEM -->
                    <div class="bg-white/5
                        border border-white/10
                        rounded-3xl p-6
                        backdrop-blur-sm">

                        <div class="text-cyan-300 text-xl mb-3">
                            ✓
                        </div>

                        <h4 class="font-semibold text-lg">
                            Tiket Fleksibel
                        </h4>

                        <p class="text-sm text-white/70 mt-2">
                            Pemesanan tiket tersedia secara
                            online maupun langsung di museum.
                        </p>

                    </div>

                    <!-- ITEM -->
                    <div class="bg-white/5
                        border border-white/10
                        rounded-3xl p-6
                        backdrop-blur-sm">

                        <div class="text-cyan-300 text-xl mb-3">
                            ✓
                        </div>

                        <h4 class="font-semibold text-lg">
                            Lokasi Strategis
                        </h4>

                        <p class="text-sm text-white/70 mt-2">
                            Berlokasi di Situs Semedo,
                            Kabupaten Tegal.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

</x-app-layout>