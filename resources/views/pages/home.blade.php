@extends('layouts.app')

@section('content')

<!-- ========================================= -->
<!-- HERO SECTION                              -->
<!-- ========================================= -->
<header class="relative h-screen min-h-[700px] w-full overflow-hidden">

    <!-- Background -->
    <img
        src="{{ ($hero && $hero->image)
            ? asset('storage/' . $hero->image) . '?v=' . $hero->updated_at->timestamp
            : asset('images/background.jpg') }}"

        class="absolute inset-0
        w-full h-full
        object-cover
        brightness-95
        contrast-110
        scale-105">

    <!-- SOFT BLUR LAYER (TRIK UTAMA) -->
    <div class="absolute inset-0 backdrop-blur-[2px]"></div>

    <!-- OVERLAY RINGAN -->
    <div class="absolute inset-0 
        bg-gradient-to-b 
        from-[#0f2a2c]/40 
        via-[#0f2a2c]/20 
        to-[#0f2a2c]/50">
    </div>

    <!-- CONTENT -->
    <div class="relative z-10
            min-h-screen
            flex flex-col
            justify-center
            items-center
            text-center
            px-6
            pt-24
            text-white">

        <h1 class="text-3xl sm:text-4xl md:text-6xl font-extrabold tracking-wide drop-shadow-md">

            {{ $hero->title ?? 'Museum Semedo' }}

        </h1>

        <p class="mt-6 text-lg md:text-2xl text-white/90
                max-w-2xl leading-relaxed">

            {{ $hero->content ?? 'Menjelajahi jejak prasejarah melalui fosil dan artefak berharga dari Situs Semedo, Tegal.' }}

        </p>

        <!-- CTA -->
        <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">

            <a href="/informasi"
               class="px-8 py-3 bg-[#1ecad3] text-[#0f2a2c]
                      font-semibold rounded-full shadow-lg
                      border-2 border-transparent
                      hover:bg-transparent
                      hover:text-white
                      hover:border-white
                      transition">
                Informasi Kunjungan
            </a>

            <a href="#koleksi"
               class="px-8 py-3 border-2 border-white
                      text-white font-semibold rounded-full
                      hover:bg-white hover:text-[#0f2a2c]
                      transition">
                Lihat Koleksi
            </a>

        </div>

    </div>

</header>


<!-- ========================================= -->
<!-- ABOUT                                     -->
<!-- ========================================= -->
<section id="tentang" class="py-16 md:py-24 bg-white">

    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-[5fr_7fr] gap-14 items-center">
            <!-- FOTO -->
            <div>
                <img
                    src="{{ asset('images/bg-login.jpg') }}"
                    alt="Museum Semedo"
                    class="w-full max-h-[500px] object-cover rounded-3xl shadow-xl">
            </div>

            <!-- KONTEN -->
            <div>
                <span
                    class="inline-block px-4 py-2 rounded-full
                    bg-cyan-50 text-cyan-700 text-sm font-medium">

                    Tentang Museum

                </span>

                <h2
                    class="text-3xl md:text-4xl font-bold text-gray-900 mt-5 mb-6">

                    Selamat Datang di Museum Semedo

                </h2>

                <p
                    class="text-gray-600 leading-8 text-justify mb-6">

                    Museum Semedo merupakan destinasi wisata edukasi
                    yang menyimpan berbagai temuan fosil dan artefak
                    prasejarah dari Situs Semedo di Kabupaten Tegal.
                    Museum ini menjadi pusat informasi sejarah kehidupan
                    purba sekaligus sarana pembelajaran bagi masyarakat
                    dan pelajar.

                </p>

                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <span class="text-cyan-600">✓</span>
                        <span>
                            Koleksi fosil dan artefak prasejarah
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-cyan-600">✓</span>
                        <span>
                            Wisata edukasi untuk pelajar dan keluarga
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-cyan-600">✓</span>
                        <span>
                            Pusat informasi Situs Semedo
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- ========================================= -->
<!-- INFORMASI & LAYANAN PENGUNJUNG            -->
<!-- ========================================= -->
<section class="py-16 md:py-24 bg-white">

    <!-- HEADER -->
    <div class="max-w-7xl mx-auto px-4 md:px-6 text-center mb-16">

        <span class="inline-flex items-center
            px-4 py-2 rounded-full
            bg-cyan-50 text-cyan-700
            text-sm font-medium">

            Informasi & Layanan

        </span>

        <h2 class="mt-5 text-3xl md:text-4xl font-bold text-gray-900">

            Jelajahi Museum Semedo

        </h2>

        <p class="mt-4 text-gray-500 max-w-2xl mx-auto leading-relaxed">

            Temukan berbagai layanan dan informasi penting
            untuk mendukung pengalaman kunjungan Anda
            di Museum Semedo.

        </p>

    </div>

    <!-- GRID -->
    <div class="max-w-7xl mx-auto px-4 md:px-6">

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            <!-- ================================= -->
            <!-- TIKET KUNJUNGAN -->
            <!-- ================================= -->
            <a href="{{ route('tiket.online') }}"
                class="group bg-white border border-gray-200
                rounded-3xl p-6 md:p-8
                hover:border-cyan-400
                hover:shadow-2xl
                hover:-translate-y-1
                transition-all duration-300">

                <!-- ICON -->
                <div class="w-12 h-12 rounded-2xl
                    flex items-center justify-center
                    mb-6">

                    <i data-lucide="ticket"
                        class="w-6 h-6 text-cyan-600"></i>

                </div>

                <!-- TITLE -->
                <h3 class="text-xl font-semibold text-gray-900 mb-3">

                    Tiket Kunjungan

                </h3>

                <!-- DESC -->
                <p class="text-gray-500 leading-relaxed mb-6">

                    Pesan tiket kunjungan Museum Semedo
                    secara online dengan proses cepat,
                    mudah, dan praktis.

                </p>

                <!-- CTA -->
                <div class="inline-flex items-center gap-2
                text-[#0f766e] font-medium text-sm">

                    Pesan Tiket

                    <span
                        class="group-hover:translate-x-1 transition">

                        →

                    </span>

                </div>

            </a>


            <!-- ================================= -->
            <!-- INFORMASI KUNJUNGAN -->
            <!-- ================================= -->
            <a href="{{ route('informasi') }}"
                class="group bg-white border border-gray-200
                rounded-3xl p-6 md:p-8
                hover:border-cyan-400
                hover:shadow-2xl
                hover:-translate-y-1
                transition-all duration-300">

                <!-- ICON -->
                <div class="w-12 h-12 rounded-2xl
                    flex items-center justify-center
                    mb-6">

                    <i data-lucide="map-pinned"
                        class="w-6 h-6 text-emerald-600"></i>

                </div>

                <!-- TITLE -->
                <h3 class="text-xl font-semibold text-gray-900 mb-3">

                    Informasi Kunjungan

                </h3>

                <!-- DESC -->
                <p class="text-gray-500 leading-relaxed mb-6">

                    Dapatkan informasi mengenai
                    jam operasional, lokasi museum,
                    fasilitas, dan panduan kunjungan.

                </p>

                <!-- CTA -->
                <div class="inline-flex items-center gap-2
                text-[#0f766e] font-medium text-sm">

                    Lihat Informasi

                    <span
                        class="group-hover:translate-x-1 transition">

                        →

                    </span>

                </div>

            </a>


            <!-- ================================= -->
            <!-- KOLEKSI -->
            <!-- ================================= -->
            <a href="{{ route('koleksi') }}"
                class="group bg-white border border-gray-200
                rounded-3xl p-6 md:p-8
                hover:border-cyan-400
                hover:shadow-2xl
                hover:-translate-y-1
                transition-all duration-300">

                <!-- ICON -->
                <div class="w-12 h-12 rounded-2xl
                    flex items-center justify-center
                    mb-6">

                    <i data-lucide="landmark"
                        class="w-6 h-6 text-amber-600"></i>

                </div>

                <!-- TITLE -->
                <h3 class="text-xl font-semibold text-gray-900 mb-3">

                    Koleksi Museum

                </h3>

                <!-- DESC -->
                <p class="text-gray-500 leading-relaxed mb-6">

                    Jelajahi berbagai koleksi fosil,
                    artefak, dan peninggalan prasejarah
                    dari Situs Semedo.

                </p>

                <!-- CTA -->
                <div class="inline-flex items-center gap-2
                text-[#0f766e] font-medium text-sm">

                    Lihat Koleksi

                    <span
                        class="group-hover:translate-x-1 transition">

                        →

                    </span>

                </div>

            </a>

        </div>

    </div>

</section>


<!-- ========================================= -->
<!-- KOLEKSI UNGGULAN                          -->
<!-- ========================================= -->
<section id="koleksi" class="py-16 md:py-24 bg-[#f8fafc]">

    <div class="max-w-7xl mx-auto px-4 md:px-6">

        <!-- Judul -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-[#1f2937]">
                Koleksi Unggulan
            </h2>
            <p class="text-gray-600 mt-4">
                Jejak kehidupan purba yang ditemukan di Kawasan Semedo
            </p>
        </div>

        <!-- Grid -->
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">

            <!-- CARD 1 — KERBAU PURBA -->
            <div class="group relative h-[320px] md:h-[420px] rounded-3xl overflow-hidden shadow-xl">

                <img src="{{ asset('images/koleksi-1.jpg') }}"
                     class="absolute w-full h-full object-cover
                            transition duration-700 group-hover:scale-110">

                <div class="absolute inset-0 bg-black/50 group-hover:bg-black/65 transition"></div>

                <div class="absolute bottom-0 p-5 md:p-8 text-white">
                    <h3 class="text-2xl font-bold mb-2">
                        Kerbau Purba
                    </h3>
                    <p class="text-sm opacity-90 mb-5">
                        Tengkorak Bubalus palaeokarabau, fauna besar yang hidup
                        pada masa Pleistosen di Semedo.
                    </p>

                    <a href="{{ url('/koleksi') }}"
                    class="px-5 py-2 border border-white rounded-full
                            hover:bg-white hover:text-black transition">
                        Lihat Detail
                    </a>
                </div>

            </div>

            <!-- CARD 2 — HOMO ERECTUS -->
            <div class="group relative h-[320px] md:h-[420px] rounded-3xl overflow-hidden shadow-xl">

                <img src="{{ asset('images/koleksi-2.jpg') }}"
                     class="absolute w-full h-full object-cover
                            transition duration-700 group-hover:scale-110">

                <div class="absolute inset-0 bg-black/50 group-hover:bg-black/65 transition"></div>

                <div class="absolute bottom-0 p-5 md:p-8 text-white">
                    <h3 class="text-2xl font-bold mb-2">
                        Fosil Manusia Purba
                    </h3>
                    <p class="text-sm opacity-90 mb-5">
                        Bukti keberadaan Homo erectus di kawasan Semedo.
                    </p>

                    <a href="{{ url('/koleksi') }}"
                    class="px-5 py-2 border border-white rounded-full
                            hover:bg-white hover:text-black transition">
                        Lihat Detail
                    </a>
                </div>

            </div>

            <!-- CARD 3 — MOLUSKA LAUT -->
            <div class="group relative h-[320px] md:h-[420px] rounded-3xl overflow-hidden shadow-xl">

                <img src="{{ asset('images/koleksi-3.jpg') }}"
                     class="absolute w-full h-full object-cover
                            transition duration-700 group-hover:scale-110">

                <div class="absolute inset-0 bg-black/50 group-hover:bg-black/65 transition"></div>

                <div class="absolute bottom-0 p-5 md:p-8 text-white">
                    <h3 class="text-2xl font-bold mb-2">
                        Fosil Moluska Laut Purba
                    </h3>
                    <p class="text-sm opacity-90 mb-5">
                        Fosil kerang, siput, dan fauna laut yang menunjukkan Semedo
                        pernah menjadi lingkungan laut purba.
                    </p>

                    <a href="{{ url('/koleksi') }}"
                    class="px-5 py-2 border border-white rounded-full
                            hover:bg-white hover:text-black transition">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================= -->
<!-- SEJARAH MUSEUM SEMEDO -->
<!-- ========================================= -->
<section id="sejarah" class="py-14 md:py-20 bg-[#f8fafc]">

    <!-- HEADER -->
    <div class="max-w-4xl mx-auto px-6 text-center mb-14">

        <span class="inline-flex items-center
            px-4 py-2 rounded-full
            bg-cyan-50 text-cyan-700
            text-sm font-medium">

            Perjalanan Museum

        </span>

        <h2 class="mt-5 text-4xl font-bold text-gray-900">

            Sejarah Museum Semedo

        </h2>

        <p class="mt-4 text-gray-500 max-w-2xl mx-auto leading-relaxed">

            Perjalanan penting dalam perkembangan Situs Semedo
            hingga menjadi salah satu pusat edukasi prasejarah
            di Kabupaten Tegal.

        </p>

    </div>


    <!-- TIMELINE -->
    <div class="max-w-5xl mx-auto px-6">

        <div class="relative">

            <!-- GARIS TIMELINE -->
            <div class="
                absolute
                left-[10px]
                top-0
                bottom-0
                w-[2px]
                bg-gradient-to-b
                from-cyan-500
                via-cyan-300
                to-cyan-100
                rounded-full">
            </div>


            <!-- ================================= -->
            <!-- 2012 -->
            <!-- ================================= -->

            <div class="relative pl-10 md:pl-12 pb-10">

                <!-- DOT -->
                <div class="
                    absolute
                    left-0
                    top-2
                    w-5 h-5
                    rounded-full
                    bg-cyan-500
                    border-[3px]
                    border-white
                    shadow-md">
                </div>

                <!-- YEAR -->
                <span class="
                    text-cyan-600
                    font-bold
                    text-2xl">

                    2012

                </span>

                <!-- TITLE -->
                <h3 class="
                    mt-1
                    text-lg
                    font-semibold
                    text-gray-900">

                    Penemuan Awal Fosil Purba

                </h3>

                <!-- DESC -->
                <p class="
                    mt-2
                    text-gray-600
                    leading-7
                    max-w-3xl text-justify">

                    Warga sekitar menemukan fosil manusia purba
                    dan berbagai artefak bersejarah yang kemudian
                    menarik perhatian para peneliti dan arkeolog
                    untuk melakukan penelitian lebih lanjut
                    di kawasan Semedo.

                </p>

            </div>


            <!-- ================================= -->
            <!-- 2015 -->
            <!-- ================================= -->

            <div class="relative pl-10 md:pl-12 pb-10">

                <!-- DOT -->
                <div class="
                    absolute
                    left-0
                    top-2
                    w-5 h-5
                    rounded-full
                    bg-cyan-500
                    border-[3px]
                    border-white
                    shadow-md">
                </div>

                <!-- YEAR -->
                <span class="
                    text-cyan-600
                    font-bold
                    text-2xl">

                    2015

                </span>

                <!-- TITLE -->
                <h3 class="
                    mt-1
                    text-lg
                    font-semibold
                    text-gray-900">

                    Penelitian Arkeologi Intensif

                </h3>

                <!-- DESC -->
                <p class="
                    mt-2
                    text-gray-600
                    leading-7
                    max-w-3xl text-justify">

                    Berbagai penelitian arkeologi dilakukan
                    untuk mengidentifikasi temuan fosil dan artefak,
                    sekaligus mengungkap sejarah kehidupan prasejarah
                    yang pernah berkembang di kawasan Semedo.

                </p>

            </div>


            <!-- ================================= -->
            <!-- 2017 -->
            <!-- ================================= -->

            <div class="relative pl-10 md:pl-12 pb-10">

                <!-- DOT -->
                <div class="
                    absolute
                    left-0
                    top-2
                    w-5 h-5
                    rounded-full
                    bg-cyan-500
                    border-[3px]
                    border-white
                    shadow-md">
                </div>

                <!-- YEAR -->
                <span class="
                    text-cyan-600
                    font-bold
                    text-2xl">

                    2017

                </span>

                <!-- TITLE -->
                <h3 class="
                    mt-1
                    text-lg
                    font-semibold
                    text-gray-900">

                    Berdirinya Museum Semedo

                </h3>

                <!-- DESC -->
                <p class="
                    mt-2
                    text-gray-600
                    leading-7
                    max-w-3xl text-justify">

                    Museum Semedo resmi dibuka sebagai pusat edukasi,
                    penelitian, dan pelestarian warisan budaya
                    prasejarah yang menjadi kebanggaan Kabupaten Tegal
                    serta destinasi wisata edukasi nasional.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- ========================================= -->
<!-- LOKASI                                    -->
<!-- ========================================= -->
<section id="lokasi" class="py-14 md:py-20 bg-white">

    <div class="max-w-5xl mx-auto px-6 text-center mb-8">
        <h2 class="text-4xl font-bold text-[#1f2937]">
            Lokasi Museum
        </h2>
    </div>

    <div class="max-w-5xl mx-auto px-6">
        <iframe
            class="w-full h-72 md:h-96 rounded-2xl shadow-md"
            src="https://www.google.com/maps?q=Museum+Situs+Semedo&output=embed"
            loading="lazy">
        </iframe>
    </div>

</section>


<!-- ========================================= -->
<!-- FOOTER (PROFESIONAL)                      -->
<!-- ========================================= -->
@php

$getFooter = function ($section) use ($footer) {

    return optional(
        $footer->where(
            'section',
            $section
        )->first()
    )->title;
};

@endphp

<footer class="bg-[#0f2a2c] text-white">

    <!-- TOP -->
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-14
            grid
            grid-cols-1
            md:grid-cols-[2fr_1fr_1fr_1fr]
            gap-10 md:gap-12">

        <!-- Brand + Logo -->
        <div>
            <div class="flex items-center gap-3 mb-4">

                <!-- Logo instansi -->
                <img src="/images/footer.png"
                     alt="Logo Museum"
                     class="w-12 h-12 object-contain">

                <h3 class="text-2xl font-bold text-[#1ecad3]">
                    Museum Semedo
                </h3>

            </div>

            <p class="text-gray-300 text-sm leading-relaxed text-justify">
                {{ $getFooter('description') }}
            </p>
        </div>

        <!-- Kontak -->
        <div>
            <h4 class="font-semibold mb-4">Kontak</h4>

            <ul class="space-y-3 text-gray-300 text-sm">

                <li class="flex items-start gap-3">
                    <!-- Icon lokasi -->
                    <i data-lucide="map"></i>
                    {{ $getFooter('alamat') }}
                </li>

                <li class="flex items-center gap-3">
                    <i data-lucide="phone"></i>
                    {{ $getFooter('telepon') }}
                </li>

                <li class="flex items-center gap-3">
                    <i data-lucide="mail"></i>
                    {{ $getFooter('email') }}
                </li>

            </ul>
        </div>

        <!-- Tautan -->
        <div>
            <h4 class="font-semibold mb-4 pl-3">
                Tautan
            </h4>

            <ul class="grid grid-cols-2 gap-x-2 gap-y-3
                    text-gray-300 text-sm">

                <li>
                    <a href="/"
                    class="block pl-3 border-l-2 border-transparent
                            hover:border-[#1ecad3]
                            hover:text-[#1ecad3]
                            transition">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="/tiket"
                    class="block pl-3 border-l-2 border-transparent
                            hover:border-[#1ecad3]
                            hover:text-[#1ecad3]
                            transition">
                        Tiket
                    </a>
                </li>

                <li>
                    <a href="/tentang"
                    class="block pl-3 border-l-2 border-transparent
                            hover:border-[#1ecad3]
                            hover:text-[#1ecad3]
                            transition">
                        Tentang
                    </a>
                </li>

                <li>
                    <a href="/koleksi"
                    class="block pl-3 border-l-2 border-transparent
                            hover:border-[#1ecad3]
                            hover:text-[#1ecad3]
                            transition">
                        Koleksi
                    </a>
                </li>

                <li>
                    <a href="/informasi"
                    class="block pl-3 border-l-2 border-transparent
                            hover:border-[#1ecad3]
                            hover:text-[#1ecad3]
                            transition">
                        Informasi
                    </a>
                </li>

                <li>
                    <a href="https://wa.me/6281325907771?text=Halo%20Museum%20Semedo,%20saya%20ingin%20bertanya%20mengenai%20kunjungan."
                    target="_blank"
                    rel="noopener noreferrer"
                    class="block pl-3 border-l-2 border-transparent
                            hover:border-[#1ecad3]
                            hover:text-[#1ecad3]
                            transition">
                        Hubungi Kami
                    </a>
                </li>
            </ul>
        </div>

        <!-- Media Sosial -->
        <div>

            <h4 class="font-semibold mb-4">
                Media Sosial
            </h4>

            <div class="flex gap-4">

                <a href="{{ $getFooter('instagram') }}"
                   class="w-11 h-11 flex items-center justify-center
                          bg-white/10 rounded-xl
                          hover:bg-[#1ecad3] hover:text-[#0f2a2c]
                          transition">

                    <!-- Instagram -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6"
                         fill="currentColor"
                         viewBox="0 0 24 24">
                        <path d="M7.5 2h9A5.5 5.5 0 0 1 22 7.5v9A5.5 5.5 0 0 1 16.5 22h-9A5.5 5.5 0 0 1 2 16.5v-9A5.5 5.5 0 0 1 7.5 2zm4.5 5.5A4.5 4.5 0 1 0 16.5 12 4.51 4.51 0 0 0 12 7.5z"/>
                    </svg>
                </a>

                <a href="{{ $getFooter('tiktok') }}"
                   class="w-11 h-11 flex items-center justify-center
                          bg-white/10 rounded-xl
                          hover:bg-[#1ecad3] hover:text-[#0f2a2c]
                          transition">

                    <!-- TikTok -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6"
                         fill="currentColor"
                         viewBox="0 0 24 24">
                        <path d="M12.75 2v12.16a3.25 3.25 0 1 1-2.5-3.16V8.5a6.25 6.25 0 1 0 4.75 6.07V6.93a6.5 6.5 0 0 0 3.5 1.07V5.5a4 4 0 0 1-3.5-3.5z"/>
                    </svg>
                </a>

                <a href="{{ $getFooter('youtube') }}"
                   class="w-11 h-11 flex items-center justify-center
                          bg-white/10 rounded-xl
                          hover:bg-[#1ecad3] hover:text-[#0f2a2c]
                          transition">

                    <!-- YouTube -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6"
                         fill="currentColor"
                         viewBox="0 0 24 24">
                        <path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.7 3.5 12 3.5 12 3.5s-7.7 0-9.4.6A3 3 0 0 0 .5 6.2A31 31 0 0 0 0 12a31 31 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.7.6 9.4.6 9.4.6s7.7 0 9.4-.6a3 3 0 0 0 2.1-2.1A31 31 0 0 0 24 12a31 31 0 0 0-.5-5.8zM9.5 15.5v-7l6 3.5z"/>
                    </svg>
                </a>

            </div>
        </div>

    </div>

    <!-- GARIS PEMISAH LEBIH JELAS -->
    <div class="border-t border-[#1ecad3]/30"></div>

    <!-- BOTTOM -->
    <div class="text-center py-4 text-gray-400 text-sm">
        {{ $getFooter('copyright') }}
    </div>

</footer>
@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {
    lucide.createIcons();
});
</script>

@endpush

@endsection