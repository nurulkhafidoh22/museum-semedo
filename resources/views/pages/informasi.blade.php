<x-app-layout>

@php

$badge = $informasi->where('section','badge')->first();

$title1 = $informasi->where('section','title_1')->first();

$title2 = $informasi->where('section','title_2')->first();

$title3 = $informasi->where('section','title_3')->first();

$description = $informasi->where('section','description')->first();

$image = $informasi->where('section','image')->first();

$jamHari = $informasi->where('section','jam_hari')->first();

$jamWaktu = $informasi->where('section','jam_waktu')->first();

$tutupHari = $informasi->where('section','tutup_hari')->first();

$tutupStatus = $informasi->where('section','tutup_status')->first();

$liburHari = $informasi->where('section','libur_hari')->first();

$liburStatus = $informasi->where('section','libur_status')->first();

$hargaAnak = $tiket->where('section','harga_anak')->first();

$hargaDewasa = $tiket->where('section','harga_dewasa')->first();

$hargaWna = $tiket->where('section','harga_wna')->first();

@endphp

    <div class="min-h-screen py-20 md:py-24 bg-[#f8fafc] overflow-x-hidden">

    <div class="max-w-5xl mx-auto px-4 md:px-6 space-y-16">

        <!-- ========================================= -->
        <!-- HERO -->
        <!-- ========================================= -->

        <section class="relative overflow-hidden rounded-[32px]
            bg-gradient-to-br
            from-[#062b30]
            via-[#0f3c44]
            to-[#14535d]
            text-white">

            <div class="absolute inset-0 bg-black/20"></div>

            <div class="relative grid lg:grid-cols-2 gap-10
                items-center p-6 md:p-10 lg:p-14">

                <!-- TEXT -->
                <div>

                    <span class="inline-flex items-center
                        px-4 py-2 rounded-full
                        bg-white/10 border border-white/10
                        text-sm font-medium">

                        {{ $badge?->title ?? 'Panduan Kunjungan' }}

                    </span>

                    <h1 class="mt-6
                        text-3xl sm:text-4xl md:text-5xl
                        font-bold leading-tight">

                        {{ $title1?->title ?? 'Persiapkan' }}

                        <span class="block text-cyan-300">

                            {{ $title2?->title ?? 'Kunjungan Anda' }}

                        </span>

                        {{ $title3?->title ?? 'Sekarang' }}

                    </h1>

                    <p class="mt-6 text-white/80
                        text-sm md:text-base
                        leading-7 md:leading-8
                        max-w-xl text-justify">

                        {{ $description?->title ?? 'Dapatkan informasi lengkap mengenai jam operasional,
                        harga tiket, alur validasi QR Code, serta tata tertib
                        kunjungan sebelum menjelajahi koleksi Museum Semedo.' }}

                    </p>

                </div>

                <!-- FOTO -->
                <div>

                    <img
                        src="{{ ($image && $image->image)
                            ? asset('storage/'.$image->image) . '?v=' . strtotime($image->updated_at)
                            : asset('images/bg-informasi.jpg') }}"
                        alt="Museum Semedo"
                        class="rounded-3xl shadow-2xl
                        object-cover w-full
                        h-[240px] sm:h-[320px]">

                </div>

            </div>

        </section>

        <!-- ================= JAM OPERASIONAL ================= -->
        <section class="bg-white border border-gray-200
                rounded-2xl shadow-sm p-6 md:p-8 space-y-5">

            <h2 class="text-2xl font-semibold text-[#0f2a2c]">
                Jam Operasional
            </h2>

            <div class="space-y-2 text-gray-700">

                <p>
                    <span class="font-semibold">
                        {{ $jamHari?->title ?? 'Selasa – Minggu' }}
                    </span>
                    :
                    {{ $jamWaktu?->title ?? '08.00 – 15.30 WIB' }}
                </p>

                <p>
                    <span class="font-semibold">
                        {{ $tutupHari?->title ?? 'Senin' }}
                    </span>
                    :
                    {{ $tutupStatus?->title ?? 'Tutup' }}
                </p>

                <p>
                    <span class="font-semibold">
                        {{ $liburHari?->title ?? 'Hari Libur Nasional Keagamaan' }}
                    </span>
                    :
                    {{ $liburStatus?->title ?? 'Tutup' }}
                </p>

            </div>

        </section>

        <!-- ================= HARGA TIKET ================= -->
        <section class="space-y-8">

            <h2 class="text-2xl font-semibold text-[#0f2a2c] text-center">
                Harga Tiket
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Anak -->
                <div class="bg-white border border-gray-200
                            rounded-3xl shadow-sm p-6 md:p-8 text-center
                            transition hover:shadow-md hover:-translate-y-1">

                    <h3 class="text-gray-500 mb-2">
                        Anak (3–12 Tahun)
                    </h3>

                    <p class="text-4xl font-bold text-[#1ecad3] mb-3">
                        Rp {{ number_format($hargaAnak?->title ?? 3000, 0, ',', '.') }}
                    </p>

                    <p class="text-sm text-gray-500">
                        Usia 3–12 tahun
                    </p>

                </div>

                <!-- Dewasa (Highlight) -->
                <div class="bg-[#0f2a2c] text-white
                            rounded-3xl shadow-xl p-6 md:p-8 text-center
                            md:scale-105 relative">

                    <span class="absolute -top-3 left-1/2
                                 -translate-x-1/2
                                 bg-[#1ecad3] text-[#0f2a2c]
                                 text-xs font-semibold
                                 px-4 py-1 rounded-full">
                        Paling Umum
                    </span>

                    <h3 class="text-white/80 mb-2">
                        Dewasa
                    </h3>

                    <p class="text-4xl md:text-5xl font-bold mb-3">
                        Rp {{ number_format($hargaDewasa?->title ?? 8000, 0, ',', '.') }}
                    </p>

                    <p class="text-sm text-white/70">
                        Usia di atas 12 tahun
                    </p>

                </div>

                <!-- WNA -->
                <div class="bg-white border border-gray-200
                            rounded-3xl shadow-sm p-6 md:p-8 text-center
                            transition hover:shadow-md hover:-translate-y-1">

                    <h3 class="text-gray-500 mb-2">
                        WNA (Anak & Dewasa)
                    </h3>

                    <p class="text-4xl font-bold text-[#1ecad3] mb-3">
                        Rp {{ number_format($hargaWna?->title ?? 20000, 0, ',', '.') }}
                    </p>

                    <p class="text-sm text-gray-500">
                        Wisatawan Mancanegara
                    </p>

                </div>

            </div>

        </section>

        <!-- ========================================= -->
        <!-- ALUR KUNJUNGAN -->
        <!-- ========================================= -->

        <section class="bg-white border border-gray-200
            rounded-3xl shadow-sm p-8 md:p-10">

            <div class="text-center mb-12">

                <span class="text-sm font-medium text-[#0f766e]">

                    Alur Kunjungan

                </span>

                <h2 class="mt-2 text-2xl md:text-3xl font-bold text-[#0f2a2c]">

                    Kunjungan Berbasis QR Code

                </h2>

                <p class="mt-4
                    max-w-2xl mx-auto
                    text-sm text-gray-500
                    leading-7">

                    Sebelum memasuki area museum, pengunjung diwajibkan
                    mengisi data kunjungan melalui website dan melakukan
                    validasi QR Code kepada petugas.

                </p>

            </div>

            <div class="relative">

                <!-- GARIS TIMELINE DESKTOP -->
                <div class="hidden md:block absolute
                    top-7 left-[10%] right-[10%]
                    h-0.5 bg-cyan-200">
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-8 relative">

                    <!-- STEP 1 -->
                    <div class="text-center">

                        <div class="w-12 h-12 md:w-14 md:h-14 mx-auto
                            rounded-full
                            bg-cyan-50
                            border-2 border-cyan-200
                            flex items-center justify-center">

                            <i data-lucide="ticket"
                                class="w-6 h-6 text-cyan-600">
                            </i>

                        </div>

                        <h3 class="mt-4 font-semibold text-[#0f2a2c]">

                            Pilih Tiket

                        </h3>

                        <p class="mt-2 text-sm text-gray-600 leading-relaxed">

                            Pilih tiket online atau offline
                            sesuai metode kunjungan.

                        </p>

                    </div>

                    <!-- STEP 2 -->
                    <div class="text-center">

                        <div class="w-12 h-12 md:w-14 md:h-14 mx-auto
                            rounded-full
                            bg-cyan-50
                            border-2 border-cyan-200
                            flex items-center justify-center">

                            <i data-lucide="user-round"
                                class="w-6 h-6 text-cyan-600">
                            </i>

                        </div>

                        <h3 class="mt-4 font-semibold text-[#0f2a2c]">

                            Isi Data

                        </h3>

                        <p class="mt-2 text-sm text-gray-600 leading-relaxed">

                            Lengkapi data demografis
                            pengunjung museum.

                        </p>

                    </div>

                    <!-- STEP 3 -->
                    <div class="text-center">

                        <div class="w-12 h-12 md:w-14 md:h-14 mx-auto
                            rounded-full
                            bg-cyan-50
                            border-2 border-cyan-200
                            flex items-center justify-center">

                            <i data-lucide="qr-code"
                                class="w-6 h-6 text-cyan-600">
                            </i>

                        </div>

                        <h3 class="mt-4 font-semibold text-[#0f2a2c]">

                            Dapatkan QR

                        </h3>

                        <p class="mt-2 text-sm text-gray-600 leading-relaxed">

                            Sistem akan menghasilkan
                            QR Code tiket kunjungan.

                        </p>

                    </div>

                    <!-- STEP 4 -->
                    <div class="text-center">

                        <div class="w-12 h-12 md:w-14 md:h-14 mx-auto
                            rounded-full
                            bg-cyan-50
                            border-2 border-cyan-200
                            flex items-center justify-center">

                            <i data-lucide="scan-line"
                                class="w-6 h-6 text-cyan-600">
                            </i>

                        </div>

                        <h3 class="mt-4 font-semibold text-[#0f2a2c]">

                            Validasi

                        </h3>

                        <p class="mt-2 text-sm text-gray-600 leading-relaxed">

                            QR Code dipindai oleh
                            petugas museum.

                        </p>

                    </div>

                    <!-- STEP 5 -->
                    <div class="text-center">

                        <div class="w-12 h-12 md:w-14 md:h-14 mx-auto
                            rounded-full
                            bg-cyan-50
                            border-2 border-cyan-200
                            flex items-center justify-center">

                            <i data-lucide="building-2"
                                class="w-6 h-6 text-cyan-600">
                            </i>

                        </div>

                        <h3 class="mt-4 font-semibold text-[#0f2a2c]">

                            Kunjungan

                        </h3>

                        <p class="mt-2 text-sm text-gray-600 leading-relaxed">

                            Pengunjung dapat menikmati
                            seluruh koleksi museum.

                        </p>

                    </div>

                </div>

            </div>

        </section>

        <!-- ========================================= -->
        <!-- ATURAN KUNJUNGAN -->
        <!-- ========================================= -->

        <section>

            <div class="text-center mb-10">

                <span class="text-sm font-medium text-[#0f766e]">

                    Tata Tertib

                </span>

                <h2 class="mt-2 text-2xl md:text-3xl font-bold text-[#0f2a2c]">

                    Aturan Kunjungan Museum

                </h2>

                <p class="mt-4
                    max-w-2xl mx-auto
                    text-sm text-gray-500
                    leading-7">
                    Demi menjaga kenyamanan pengunjung serta
                    kelestarian koleksi museum, setiap pengunjung
                    diharapkan mematuhi tata tertib berikut.

                </p>

            </div>

            <div class="grid lg:grid-cols-2 gap-8">

                <!-- ================================= -->
                <!-- ATURAN UMUM -->
                <!-- ================================= -->

                <div class="bg-white border border-gray-200
                            rounded-3xl shadow-sm p-6 md:p-8">

                    <div class="flex items-center gap-4 mb-6">

                        <div class="w-12 h-12 rounded-2xl
                            bg-cyan-50
                            flex items-center justify-center">

                            <i data-lucide="shield-check"
                                class="w-6 h-6 text-cyan-600">
                            </i>

                        </div>

                        <div>

                            <h3 class="text-xl font-semibold text-[#0f2a2c]">

                                Aturan Umum

                            </h3>

                            <p class="text-sm text-gray-500">

                                Ketentuan selama berada di area museum

                            </p>

                        </div>

                    </div>

                    <div class="space-y-4">

                        <ul class="list-disc pl-6 space-y-3 text-gray-700 leading-7">

                            <li>Dilarang menyentuh koleksi museum.</li>

                            <li>Dilarang merokok di area museum.</li>

                            <li>Dilarang membawa hewan peliharaan.</li>

                            <li>Dilarang makan dan minum di ruang pamer.</li>

                            <li>Dilarang membawa senjata api maupun benda tajam.</li>

                            <li>Dilarang merusak fasilitas museum.</li>

                            <li>Dilarang membuat gaduh di ruang pamer.</li>

                            <li>Titipkan tas berukuran besar pada loker yang tersedia.</li>

                            <li>Anak-anak harus berada dalam pengawasan orang tua.</li>

                        </ul>

                    </div>

                </div>

                <!-- ================================= -->
                <!-- DOKUMENTASI -->
                <!-- ================================= -->

                <div class="bg-white border border-gray-200
                            rounded-3xl shadow-sm p-6 md:p-8">

                    <div class="flex items-center gap-4 mb-6">

                        <div class="w-12 h-12 rounded-2xl
                            bg-amber-50
                            flex items-center justify-center">

                            <i data-lucide="camera"
                                class="w-6 h-6 text-amber-600">
                            </i>

                        </div>

                        <div>

                            <h3 class="text-xl font-semibold text-[#0f2a2c]">

                                Aturan Dokumentasi

                            </h3>

                            <p class="text-sm text-gray-500">

                                Ketentuan pengambilan foto dan video

                            </p>

                        </div>

                    </div>

                    <div class="space-y-4">

                        <ul class="list-disc pl-6 space-y-3 text-gray-700 leading-7">

                            <li>Dokumentasi menggunakan kamera ponsel diperbolehkan.</li>

                            <li>Tidak diperkenankan menggunakan lampu kilat (flash).</li>

                            <li>Penggunaan drone tidak diperbolehkan.</li>

                            <li>Kamera profesional memerlukan izin petugas.</li>

                            <li>Penggunaan monopod atau tripod memerlukan izin petugas.</li>

                        </ul>

                    </div>

                </div>

            </div>

        </section>

    </div>

</div>

</x-app-layout>