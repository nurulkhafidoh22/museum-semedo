@extends('layouts.admin')

@section('content')

<div class="p-6 bg-[#f5f7fb] min-h-screen space-y-6">

    <!-- ===================================================== -->
    <!-- HEADER -->
    <!-- ===================================================== -->

    <div class="flex flex-col lg:flex-row
        lg:items-start
        lg:justify-between
        gap-6 mb-8">

        <!-- TITLE -->
        <div class="pt-3">

            <p class="text-[11px]
                tracking-[0.25em]
                uppercase
                text-[#0f766e]
                font-semibold mb-2">

                Museum Report

            </p>

            <h1 class="text-3xl font-bold text-gray-900">

                Laporan Analitik Pengunjung

            </h1>

            <p class="text-sm text-gray-500 mt-2">

                Rekap data kunjungan dan hasil analisis perilaku pengunjung.

            </p>

        </div>

        <!-- RIGHT SIDE -->
        <div class="flex flex-col gap-3">

            <!-- FILTER CARD -->
            <div class="bg-white
                border border-gray-200
                rounded-2xl
                px-4 py-4
                shadow-sm
                no-print">

                <div class="mb-3">

                    <h3 class="text-sm font-semibold text-gray-800">

                        Periode Laporan

                    </h3>

                </div>

                <form method="GET"
                    action="{{ route('admin.laporan') }}">

                    <div class="flex flex-wrap items-end gap-3">

                        <div>

                            <label class="block text-xs text-gray-500 mb-1">
                                Tanggal Mulai
                            </label>

                            <input type="date"
                                name="start_date"
                                value="{{ $start }}"
                                class="border border-gray-200
                                rounded-lg
                                px-3 py-2
                                text-sm
                                focus:ring-0
                                focus:border-[#0f766e]">

                        </div>

                        <div>

                            <label class="block text-xs text-gray-500 mb-1">
                                Tanggal Akhir
                            </label>

                            <input type="date"
                                name="end_date"
                                value="{{ $end }}"
                                class="border border-gray-200
                                rounded-lg
                                px-3 py-2
                                text-sm
                                focus:ring-0
                                focus:border-[#0f766e]">

                        </div>

                        <div class="flex gap-3">

                            <button
                                type="submit"
                                class="inline-flex items-center gap-2
                                px-4 py-2
                                rounded-lg
                                bg-[#062b30]
                                text-white
                                text-sm font-medium
                                hover:bg-[#041f23]
                                transition">

                                <i data-lucide="filter"
                                    class="w-4 h-4"></i>

                                Terapkan

                            </button>

                            <a
                                href="{{ route('admin.laporan') }}"
                                class="inline-flex items-center gap-2
                                px-4 py-2
                                rounded-lg
                                border border-gray-300
                                text-gray-700
                                text-sm font-medium
                                hover:bg-gray-100
                                transition">

                                <i data-lucide="rotate-ccw"
                                    class="w-4 h-4"></i>

                                Reset

                            </a>

                        </div>

                    </div>

                </form>

            </div>

            <!-- EXPORT ACTION -->
            <div class="flex justify-end gap-3 no-print">

                <button type="button"
                    onclick="openPrintPage()"
                    class="inline-flex items-center gap-2
                    px-4 py-2
                    rounded-lg
                    border border-gray-300
                    bg-white
                    text-gray-700
                    text-sm font-medium
                    hover:bg-gray-100
                    transition">

                    <i data-lucide="printer"
                        class="w-4 h-4"></i>

                    Print

                </button>

                <a href="{{ route('admin.laporan.pdf', [
                    'start_date' => $start,
                    'end_date' => $end
                ]) }}"
                    class="inline-flex items-center gap-2
                    px-4 py-2
                    rounded-lg
                    border border-gray-300
                    bg-white
                    text-gray-700
                    text-sm font-medium
                    hover:bg-gray-100
                    transition">

                    <i data-lucide="file-text"
                        class="w-4 h-4"></i>

                    Export PDF

                </a>

            </div>

        </div>

    </div>


    <!-- ===================================================== -->
    <!-- SUMMARY -->
    <!-- ===================================================== -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

        <!-- TOTAL -->
        <div class="rounded-2xl border border-cyan-100
            bg-cyan-50 p-5">

            <p class="text-sm text-gray-600">
                Total Pengunjung
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mt-2">
                {{ $total }}
            </h2>

            <p class="text-xs text-cyan-700 mt-4">
                Total kunjungan pada periode laporan
            </p>

        </div>

        <!-- ONLINE -->
        <div class="rounded-2xl border border-blue-100
            bg-blue-50 p-5">

            <p class="text-sm text-gray-600">
                Tiket Online
            </p>

            <h2 class="text-3xl font-bold text-[#2563eb] mt-2">
                {{ $online }}
            </h2>

            <p class="text-xs text-blue-700 mt-4">
                Pemesanan melalui website
            </p>

        </div>

        <!-- OFFLINE -->
        <div class="rounded-2xl border border-amber-100
            bg-amber-50 p-5">

            <p class="text-sm text-gray-600">
                Tiket Offline
            </p>

            <h2 class="text-3xl font-bold text-[#d97706] mt-2">
                {{ $offline }}
            </h2>

            <p class="text-xs text-amber-700 mt-4">
                Pembelian langsung di museum
            </p>

        </div>

        <!-- DOMINAN -->
        <div class="rounded-2xl p-5
            bg-gradient-to-br from-[#062b30] to-[#0b3d45]
            text-white">

            <p class="text-sm text-cyan-100">
                Dominasi Tiket
            </p>

            <h2 class="text-3xl font-bold mt-2">

                @if($online == 0 && $offline == 0)

                    -

                @elseif($online >= $offline)

                    Online

                @else

                    Offline

                @endif

            </h2>

            <p class="text-xs text-cyan-100 mt-4">

                @if($online == 0 && $offline == 0)

                    Belum tersedia data kunjungan

                @else

                    Jenis tiket paling sering digunakan

                @endif

            </p>

        </div>

    </div>


    <!-- ===================================================== -->
    <!-- INSIGHT -->
    <!-- ===================================================== -->

    <div class="bg-white border border-gray-200
        rounded-2xl p-6 shadow-sm print-section">

        <div class="flex items-center justify-between flex-wrap gap-3 mb-6">

            <div>

                <h2 class="text-xl font-semibold text-gray-900">
                    Insight Analitik
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Ringkasan hasil analisis otomatis sistem
                </p>

            </div>

            <div class="inline-flex items-center gap-2
                bg-cyan-50 text-cyan-700
                px-4 py-2 rounded-full text-xs font-medium">

                <div class="w-2 h-2 rounded-full bg-cyan-500"></div>

                Visitor Insight

            </div>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- ITEM -->
            <div class="rounded-xl border border-gray-100
                bg-gray-50 p-4">

                <p class="text-sm text-gray-700 leading-relaxed">

                    Total kunjungan museum pada periode ini mencapai
                    <strong>{{ $total }}</strong> pengunjung.

                </p>

            </div>

            <!-- ITEM -->
            <div class="rounded-xl border border-gray-100
                bg-gray-50 p-4">

                <p class="text-sm text-gray-700 leading-relaxed">

                    @if($online == 0 && $offline == 0)

                        Belum tersedia data yang cukup untuk
                        menentukan dominasi penggunaan tiket.

                    @else

                        Penggunaan tiket
                        <strong>
                            {{ $online >= $offline ? 'online' : 'offline' }}
                        </strong>
                        lebih dominan dibanding jenis tiket lainnya.

                    @endif

                </p>

            </div>

            <!-- ITEM -->
            <div class="rounded-xl border border-gray-100
                bg-gray-50 p-4">

                <p class="text-sm text-gray-700 leading-relaxed">

                    Sistem berhasil merekap dan menganalisis data kunjungan
                    berdasarkan periode yang dipilih.

                </p>

            </div>

            <!-- ITEM -->
            <div class="rounded-xl border border-gray-100
                bg-gray-50 p-4">

                <p class="text-sm text-gray-700 leading-relaxed">

                    Data laporan dapat digunakan sebagai bahan evaluasi
                    strategi promosi dan pengelolaan museum.

                </p>

            </div>

        </div>

    </div>


    <!-- ===================================================== -->
    <!-- CHART -->
    <!-- ===================================================== -->

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

        <!-- BULANAN -->
        <div class="bg-white border border-gray-200
            rounded-2xl p-5 shadow-sm print-section">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-lg font-semibold text-gray-900">
                        Grafik Bulanan
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Tren jumlah pengunjung museum
                    </p>

                </div>

                <div class="px-3 py-1.5 rounded-full
                    bg-blue-50 text-blue-700
                    text-xs font-medium">

                    Monthly Trend

                </div>

            </div>

            <div class="h-[320px]">
                <canvas id="bulananChart"></canvas>
            </div>

        </div>


        <!-- KUMULATIF -->
        <div class="bg-white border border-gray-200
            rounded-2xl p-5 shadow-sm print-section">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-lg font-semibold text-gray-900">
                        Grafik Kumulatif
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Akumulasi pertumbuhan pengunjung
                    </p>

                </div>

                <div class="px-3 py-1.5 rounded-full
                    bg-emerald-50 text-emerald-700
                    text-xs font-medium">

                    Growth Analytics

                </div>

            </div>

            <div class="h-[320px]">
                <canvas id="kumulatifChart"></canvas>
            </div>

        </div>

    </div>
        <!-- ===================================================== -->
        <!-- DATA PENGUNJUNG -->
        <!-- ===================================================== -->

        <div class="bg-white border border-gray-200
            rounded-2xl shadow-sm overflow-hidden print-section">

            <!-- HEADER -->
            <div class="flex flex-col md:flex-row
                md:items-center md:justify-between
                gap-4 p-6 border-b border-gray-100">

                <div>

                    <h2 class="text-xl font-semibold text-gray-900">
                        Data Pengunjung
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Data detail pengunjung sebagai bukti laporan sistem
                    </p>

                </div>

                <div class="inline-flex items-center gap-2
                    bg-gray-100 text-gray-700
                    px-4 py-2 rounded-full text-xs font-medium">

                    {{ $tickets->count() }} Data

                </div>

            </div>


            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="w-full table-fixed text-sm">

                    <thead class="bg-gray-50 border-b border-gray-100">

                        <tr>

                            <!-- NAMA -->
                            <th class="w-[18%] px-5 py-4 text-left
                                text-xs font-semibold uppercase
                                tracking-wide text-gray-500">

                                Nama

                            </th>

                            <!-- PROVINSI -->
                            <th class="w-[15%] px-5 py-4 text-left
                                text-xs font-semibold uppercase
                                tracking-wide text-gray-500">

                                Provinsi

                            </th>

                            <!-- USIA -->
                            <th class="w-[10%] px-5 py-4 text-center
                                text-xs font-semibold uppercase
                                tracking-wide text-gray-500">

                                Usia

                            </th>

                            <!-- INSTANSI -->
                            <th class="w-[22%] px-5 py-4 text-left
                                text-xs font-semibold uppercase
                                tracking-wide text-gray-500">

                                Instansi

                            </th>

                            <!-- FREKUENSI -->
                            <th class="w-[12%] px-5 py-4 text-center
                                text-xs font-semibold uppercase
                                tracking-wide text-gray-500">

                                Frekuensi

                            </th>

                            <!-- JUMLAH -->
                            <th class="w-[10%] px-5 py-4 text-center
                                text-xs font-semibold uppercase
                                tracking-wide text-gray-500">

                                Jumlah

                            </th>

                            <!-- TANGGAL -->
                            <th class="w-[13%] px-5 py-4 text-center
                                text-xs font-semibold uppercase
                                tracking-wide text-gray-500">

                                Tanggal

                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($tickets as $t)

                        <tr class="hover:bg-gray-50 transition duration-200">

                            <!-- NAMA -->
                            <td class="px-5 py-4 font-semibold text-gray-800 break-words">

                                {{ $t->nama }}

                            </td>

                            <!-- PROVINSI -->
                            <td class="px-5 py-4 text-gray-600 break-words">

                                {{ $t->provinsi }}

                            </td>

                            <!-- USIA -->
                            <td class="px-5 py-4 text-center text-gray-700">

                                {{ $t->kategori_umur ?? '-' }}

                            </td>

                            <!-- INSTANSI -->
                            <td class="px-5 py-4 text-gray-700 break-words">

                                {{ $t->instansi ?: 'Umum' }}

                            </td>

                            <!-- FREKUENSI -->
                            <td class="px-5 py-4 text-center">

                                <span class="inline-flex items-center justify-center
                                    min-w-[32px] h-8 px-2
                                    rounded-full text-xs font-medium
                                    bg-cyan-50 text-cyan-700">

                                    {{ $t->frekuensi }}

                                </span>

                            </td>

                            <!-- JUMLAH -->
                            <td class="px-5 py-4 text-center
                                font-semibold text-gray-800">

                                {{ $t->jumlah_tiket }}

                            </td>

                            <!-- TANGGAL -->
                            <td class="px-5 py-4 text-center
                                text-gray-500 text-xs leading-relaxed">

                                {{ \Carbon\Carbon::parse($t->tanggal_kunjungan)->format('d M Y') }}

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7"
                                class="py-16 text-center">

                                <div class="flex flex-col items-center justify-center">

                                    <!-- ICON -->
                                    <div class="w-16 h-16 rounded-2xl
                                        bg-gray-100 flex items-center justify-center mb-4">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 h-8 text-gray-400"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586A2 2 0 0114 3.586L18.414 8A2 2 0 0119 9.414V19a2 2 0 01-2 2z" />

                                        </svg>

                                    </div>

                                    <!-- TITLE -->
                                    <h3 class="text-lg font-semibold text-gray-900">

                                        Laporan Tidak Tersedia

                                    </h3>

                                    <!-- DESCRIPTION -->
                                    <p class="text-sm text-gray-500 mt-2 leading-6 max-w-md">

                                        Tidak ditemukan data pengunjung
                                        yang sesuai dengan periode atau
                                        filter laporan yang dipilih.

                                    </p>

                                    <!-- FILTER INFO -->
                                    <div class="mt-5 text-xs text-gray-400 space-y-1">

                                        @if(request('tanggal_awal'))
                                            <p>
                                                Tanggal Awal:
                                                <span class="font-medium">
                                                    {{ request('tanggal_awal') }}
                                                </span>
                                            </p>
                                        @endif

                                        @if(request('tanggal_akhir'))
                                            <p>
                                                Tanggal Akhir:
                                                <span class="font-medium">
                                                    {{ request('tanggal_akhir') }}
                                                </span>
                                            </p>
                                        @endif

                                        @if(request('provinsi'))
                                            <p>
                                                Provinsi:
                                                <span class="font-medium">
                                                    {{ request('provinsi') }}
                                                </span>
                                            </p>
                                        @endif

                                    </div>

                                    <!-- RESET BUTTON -->
                                    <div class="mt-6">

                                        <a href="{{ route('admin.laporan') }}"
                                            class="inline-flex items-center px-4 py-2
                                            rounded-lg
                                            border border-gray-300
                                            bg-white
                                            text-gray-700
                                            text-sm font-medium
                                            hover:bg-gray-50
                                            transition">

                                            Reset Filter

                                        </a>

                                    </div>

                                </div>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <!-- PAGINATION -->
            @if(!$print)

            <div class="p-5 border-t border-gray-100 no-print">

                {{ $tickets->links() }}

            </div>

            @endif

        </div>


    <!-- ===================================================== -->
    <!-- ANALISIS WILAYAH -->
    <!-- ===================================================== -->

    <div class="bg-white border border-gray-200
        rounded-2xl p-6 shadow-sm print-section">

        <div class="flex items-center justify-between mb-5">

            <div>

                <h2 class="text-xl font-semibold text-gray-900">
                    Analisis Wilayah
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Distribusi asal wilayah pengunjung museum
                </p>

            </div>

            <div class="px-3 py-1.5 rounded-full
                bg-cyan-50 text-cyan-700
                text-xs font-medium">

                Visitor Region

            </div>

        </div>


        <div class="overflow-x-auto rounded-2xl border border-gray-100">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 border-b border-gray-100">

                    <tr>

                        <th class="px-5 py-3 text-left
                            text-xs font-semibold uppercase
                            tracking-wide text-gray-500">

                            Provinsi

                        </th>

                        <th class="px-5 py-3 text-center
                            text-xs font-semibold uppercase
                            tracking-wide text-gray-500">

                            Total

                        </th>

                        <th class="px-5 py-3 text-center
                            text-xs font-semibold uppercase
                            tracking-wide text-gray-500">

                            Persentase

                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @foreach($analisisWilayah as $item)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-5 py-4 font-medium text-gray-800">

                            {{ $item->provinsi }}

                        </td>

                        <td class="px-5 py-4 text-center
                            font-semibold text-gray-800">

                            {{ $item->total }}

                        </td>

                        <td class="px-5 py-4 text-center
                            text-cyan-700 font-medium">

                            {{ number_format(($item->total / max($total,1)) * 100, 1) }}%

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        <!-- INSIGHT -->
        <div class="mt-5 rounded-xl border border-cyan-100
            bg-cyan-50 p-4">

            <p class="text-sm text-cyan-800 leading-relaxed">

                Wilayah pengunjung didominasi oleh
                <strong>
                    {{ $analisisWilayah->first()->provinsi ?? '-' }}
                </strong>
                dengan kontribusi kunjungan tertinggi
                pada periode laporan.

            </p>

        </div>

    </div>
    <!-- ===================================================== -->
    <!-- ANALISIS USIA -->
    <!-- ===================================================== -->

    <div class="bg-white border border-gray-200
        rounded-2xl p-6 shadow-sm print-section">

        <div class="flex items-center justify-between mb-5">

            <div>

                <h2 class="text-xl font-semibold text-gray-900">
                    Analisis Kelompok Usia
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Distribusi pengunjung berdasarkan kategori umur
                </p>

            </div>

            <div class="px-3 py-1.5 rounded-full
                bg-emerald-50 text-emerald-700
                text-xs font-medium">

                Age Analytics

            </div>

        </div>


        <div class="overflow-x-auto rounded-2xl border border-gray-100">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 border-b border-gray-100">

                    <tr>

                        <th class="px-5 py-3 text-left
                            text-xs font-semibold uppercase
                            tracking-wide text-gray-500">

                            Kelompok Umur

                        </th>

                        <th class="px-5 py-3 text-center
                            text-xs font-semibold uppercase
                            tracking-wide text-gray-500">

                            Total

                        </th>

                        <th class="px-5 py-3 text-center
                            text-xs font-semibold uppercase
                            tracking-wide text-gray-500">

                            Persentase

                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @foreach($analisisUsia as $item)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-5 py-4 font-medium text-gray-800">

                            {{ $item->kategori_umur }}

                        </td>

                        <td class="px-5 py-4 text-center
                            font-semibold text-gray-800">

                            {{ $item->total }}

                        </td>

                        <td class="px-5 py-4 text-center
                            text-emerald-700 font-medium">

                            {{ number_format(($item->total / max($total,1)) * 100, 1) }}%

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        <!-- INSIGHT -->
        <div class="mt-5 rounded-xl border border-emerald-100
            bg-emerald-50 p-4">

            <p class="text-sm text-emerald-800 leading-relaxed">

                Kelompok umur dominan pada periode laporan adalah
                <strong>
                    {{ $analisisUsia->first()->kategori_umur ?? '-' }}
                </strong>
                berdasarkan hasil analisis data pengunjung.

            </p>

        </div>

    </div>


    <!-- ===================================================== -->
    <!-- ANALISIS FREKUENSI -->
    <!-- ===================================================== -->

    <div class="bg-white border border-gray-200
        rounded-2xl p-6 shadow-sm print-section">

        <div class="flex items-center justify-between mb-5">

            <div>

                <h2 class="text-xl font-semibold text-gray-900">
                    Analisis Frekuensi Kunjungan
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Analisis loyalitas dan intensitas kunjungan
                </p>

            </div>

            <div class="px-3 py-1.5 rounded-full
                bg-amber-50 text-amber-700
                text-xs font-medium">

                Loyalty Analytics

            </div>

        </div>


        <div class="overflow-x-auto rounded-2xl border border-gray-100">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 border-b border-gray-100">

                    <tr>

                        <th class="px-5 py-3 text-left
                            text-xs font-semibold uppercase
                            tracking-wide text-gray-500">

                            Frekuensi

                        </th>

                        <th class="px-5 py-3 text-center
                            text-xs font-semibold uppercase
                            tracking-wide text-gray-500">

                            Total

                        </th>

                        <th class="px-5 py-3 text-center
                            text-xs font-semibold uppercase
                            tracking-wide text-gray-500">

                            Persentase

                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @foreach($analisisFrekuensi as $item)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-5 py-4 font-medium text-gray-800">

                            {{ $item->frekuensi }}

                        </td>

                        <td class="px-5 py-4 text-center
                            font-semibold text-gray-800">

                            {{ $item->total }}

                        </td>

                        <td class="px-5 py-4 text-center
                            text-amber-700 font-medium">

                            {{ number_format(($item->total / max($total,1)) * 100, 1) }}%

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        <!-- INSIGHT -->
        <div class="mt-5 rounded-xl border border-amber-100
            bg-amber-50 p-4">

            <p class="text-sm text-amber-800 leading-relaxed">

                Mayoritas pengunjung berasal dari kategori
                <strong>
                    {{ $analisisFrekuensi->first()->frekuensi ?? '-' }}
                </strong>
                berdasarkan data frekuensi kunjungan museum.

            </p>

        </div>

    </div>

</div>

@endsection


@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const bulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'];

    const bulananData = @json($chartBulanan);
    const kumulatifData = @json($chartKumulatif);

    const colors = [
        '#0891b2',
        '#2563eb',
        '#16a34a',
        '#d97706',
        '#7c3aed'
    ];


    // =====================================================
    // BULANAN
    // =====================================================

    const datasetBulanan = Object.keys(bulananData).map((tahun, i) => ({

        label: tahun,

        data: bulananData[tahun],

        borderColor: colors[i % colors.length],

        backgroundColor: colors[i % colors.length] + '20',

        tension: 0.4,

        fill: true,

        pointRadius: 4,

        pointHoverRadius: 6

    }));


    // =====================================================
    // KUMULATIF
    // =====================================================

    const datasetKumulatif = Object.keys(kumulatifData).map((tahun, i) => ({

        label: tahun,

        data: kumulatifData[tahun],

        borderColor: colors[i % colors.length],

        backgroundColor: colors[i % colors.length] + '20',

        tension: 0.4,

        fill: true,

        pointRadius: 4,

        pointHoverRadius: 6

    }));


    // =====================================================
    // CHART BULANAN
    // =====================================================

    new Chart(document.getElementById('bulananChart'), {

        type: 'line',

        data: {

            labels: bulan,

            datasets: datasetBulanan

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    position: 'bottom'

                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    grid: {

                        color: '#f1f5f9'

                    }

                },

                x: {

                    grid: {

                        display: false

                    }

                }

            }

        }

    });


    // =====================================================
    // CHART KUMULATIF
    // =====================================================

    new Chart(document.getElementById('kumulatifChart'), {

        type: 'line',

        data: {

            labels: bulan,

            datasets: datasetKumulatif

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    position: 'bottom'

                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    grid: {

                        color: '#f1f5f9'

                    }

                },

                x: {

                    grid: {

                        display: false

                    }

                }

            }

        }

    });

});


// =====================================================
// PRINT
// =====================================================

function openPrintPage() {

    const url =
        "{{ route('admin.laporan', [
            'print' => 1,
            'start_date' => $start,
            'end_date' => $end
        ]) }}";

    const printWindow = window.open(url, '_blank');

    setTimeout(() => {

        if (printWindow) {

            printWindow.focus();

            printWindow.print();

        }

    }, 800);

}

</script>

@endpush


@push('styles')

<style>

@media print {

    body {
        background: white !important;
    }

    .no-print {
        display: none !important;
    }

    .print-section {

        box-shadow: none !important;

        border: 1px solid #d1d5db !important;

        break-inside: avoid;

        page-break-inside: avoid;

        margin-bottom: 20px !important;

        overflow: visible !important;

    }

    canvas {

        max-height: 280px !important;

    }

    table {

        font-size: 11px !important;

    }

    th {

        background: #f3f4f6 !important;

    }

}

</style>

@endpush