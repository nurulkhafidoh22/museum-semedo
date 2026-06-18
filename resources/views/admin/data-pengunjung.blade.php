@extends('layouts.admin')

@section('content')

<div class="p-6 bg-[#f5f7fb] min-h-screen">

    <!-- =========================
    HEADER
    ========================== -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-8">

        <div>

            <p class="text-[11px] tracking-[0.25em] uppercase text-[#0f766e] font-semibold mb-2">
                Visitor Management
            </p>

            <h1 class="text-3xl font-bold text-gray-900 leading-tight">
                Data Pengunjung Museum
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Monitoring dan pengelolaan data pengunjung Museum Semedo
            </p>

        </div>

    </div>

    <!-- ===================================================== -->
    <!-- MINI STATISTICS -->
    <!-- ===================================================== -->

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
        
        <!-- TOTAL -->
        <div class="rounded-2xl border border-cyan-100
            bg-cyan-50/60 p-4">

            <p class="text-sm text-gray-600">
                Total Database
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mt-2">
                {{ $totalVisitors }}
            </h2>

            <p class="text-xs text-cyan-700 mt-4">
                Seluruh data pengunjung museum
            </p>

        </div>

        <!-- ONLINE -->
        <div class="rounded-2xl border border-blue-100
            bg-blue-50/60 p-4">

            <p class="text-sm text-gray-600">
                Total Online
            </p>

            <h2 class="text-2xl font-bold text-[#2563eb] mt-2">
                {{ $online }}
            </h2>

            <p class="text-xs text-blue-700 mt-4">
                Pemesanan melalui website
            </p>

        </div>

        <!-- OFFLINE -->
        <div class="rounded-2xl border border-amber-100
            bg-amber-50/60 p-4">

            <p class="text-sm text-gray-600">
                Total Offline
            </p>

            <h2 class="text-2xl font-bold text-[#d97706] mt-2">
                {{ $offline }}
            </h2>

            <p class="text-xs text-amber-700 mt-4">
                Pembelian langsung di museum
            </p>

        </div>

        <!-- HARI INI -->
        <div class="rounded-2xl p-4
            bg-gradient-to-br from-[#062b30] to-[#0b3d45]
            text-white">

            <p class="text-sm text-cyan-100">
                Data Hari Ini
            </p>

            <h2 class="text-2xl font-bold mt-2">
                {{ $today }}
            </h2>

            <p class="text-xs text-cyan-100 mt-4">
                Pengunjung tanggal
                {{ now()->translatedFormat('d F Y') }}
            </p>

        </div>

    </div>

    <!-- =========================
    FILTER BAR
    ========================== -->
    <div class="bg-white border border-gray-200 rounded-2xl p-5 mb-8">

        <form method="GET"
            action="{{ route('admin.pengunjung') }}"
            class="grid
                grid-cols-1
                sm:grid-cols-2
                xl:grid-cols-5
                gap-3">

            <!-- SEARCH -->
            <div class="xl:col-span-2">

                <label class="text-xs font-medium text-gray-500 mb-2 block">
                    Pencarian
                </label>

                <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama atau wilayah..."
                    class="w-full rounded-lg border-gray-200
                    px-3 py-2 text-sm
                    focus:border-[#0f766e]
                    focus:ring-0">

            </div>

            <!-- TANGGAL -->
            <div>

                <label class="text-xs font-medium text-gray-500 mb-2 block">
                    Tanggal
                </label>

                <input type="date"
                    name="tanggal"
                    value="{{ request('tanggal') }}"
                    class="w-full rounded-lg border-gray-200
                    px-3 py-2 text-sm
                    focus:border-[#0f766e]
                    focus:ring-0">

            </div>

            <!-- PROVINSI -->
            <div>

                <label class="text-xs font-medium text-gray-500 mb-2 block">
                    Provinsi
                </label>

                <select name="provinsi"
                    class="w-full rounded-lg border-gray-200
                    px-3 py-2 text-sm
                    focus:border-[#0f766e]
                    focus:ring-0">

                    <option value="">
                        Semua Provinsi
                    </option>

                    @foreach($provinsiList as $provinsi)

                        <option value="{{ $provinsi }}"
                            {{ request('provinsi') == $provinsi ? 'selected' : '' }}>

                            {{ $provinsi }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- JENIS -->
            <div>

                <label class="text-xs font-medium text-gray-500 mb-2 block">
                    Jenis Tiket
                </label>

                <select name="jenis_tiket"
                    class="w-full rounded-lg border-gray-200
                    px-3 py-2 text-sm
                    focus:border-[#0f766e]
                    focus:ring-0">

                    <option value="">
                        Semua Tiket
                    </option>

                    <option value="online"
                        {{ request('jenis_tiket') == 'online' ? 'selected' : '' }}>

                        Online

                    </option>

                    <option value="offline"
                        {{ request('jenis_tiket') == 'offline' ? 'selected' : '' }}>

                        Offline

                    </option>

                </select>

            </div>

            <!-- BUTTON -->
            <div class="xl:col-span-5
                        flex flex-col sm:flex-row
                        gap-3
                        pt-2">

                <!-- FILTER -->
                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2
                    px-4 py-2 rounded-lg text-sm font-medium
                    bg-[#062b30] text-white
                    hover:bg-[#041f23]
                    transition">

                    <i data-lucide="filter"
                        class="w-4 h-4"></i>

                    Terapkan

                </button>

                <!-- RESET -->
                <a
                    href="{{ route('admin.pengunjung') }}"
                    class="inline-flex items-center justify-center gap-2
                    px-4 py-2 rounded-lg text-sm font-medium
                    border border-gray-300 text-gray-700
                    hover:bg-gray-100
                    transition">

                    <i data-lucide="rotate-ccw"
                        class="w-4 h-4"></i>

                    Reset

                </a>

            </div>

        </form>

    </div>

    <!-- =========================
    TABLE
    ========================== -->
    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">

        <!-- HEADER -->
        <div class="px-6 py-5 border-b border-gray-100">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                <div>

                    <h2 class="text-xl font-semibold text-gray-900">
                        Daftar Pengunjung
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Data kunjungan pengunjung museum
                    </p>

                </div>

                <div class="flex flex-col sm:flex-row
                            sm:items-center
                            gap-3">

                    <div class="text-sm text-gray-400">
                        {{ $tickets->total() }} data
                    </div>

                    <!-- EXPORT -->
                    <a href="{{ route('admin.pengunjung.export', request()->query()) }}"
                        class="inline-flex items-center gap-2
                        w-full sm:w-auto justify-center
                        px-4 py-2
                        rounded-lg
                        border border-gray-300
                        bg-white
                        text-gray-700
                        text-sm font-medium
                        hover:bg-gray-50
                        transition">

                        <i data-lucide="download"
                            class="w-4 h-4">
                        </i>

                            Export Excel

                    </a>

                </div>

            </div>

        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px]">

                <thead class="bg-gray-50">

                <tr>

                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        Nama Pengunjung
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        Asal
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        Instansi
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        Kategori & Tiket
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        Jumlah
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        Frekuensi
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        Tanggal Kunjungan
                    </th>

                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        Aksi
                    </th>

                </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($tickets as $ticket)

                    <tr class="hover:bg-gray-50 transition">

                    <!-- NAMA PENGUNJUNG -->
                    <td class="px-6 py-5">

                        <div>

                            <h3 class="font-semibold text-gray-900">
                                {{ $ticket->nama }}
                            </h3>

                        </div>

                    </td>

                    <!-- ASAL -->
                    <td class="px-6 py-5">

                        <p class="text-sm font-medium text-gray-800">

                            {{ $provinsiMap[$ticket->provinsi] ?? $ticket->provinsi }}

                        </p>

                    </td>

                    <!-- INSTANSI -->
                    <td class="px-6 py-5">

                        <p class="text-sm text-gray-700">

                            {{ $ticket->instansi ?: 'Umum' }}

                        </p>

                    </td>

                    <!-- KATEGORI & TIKET -->
                    <td class="px-6 py-5 text-center">

                        <div class="space-y-1">

                            <p class="text-sm font-semibold text-gray-900">
                                {{ ucfirst($ticket->kategori_pengunjung ?? '-') }}
                            </p>

                            <p class="text-xs
                                {{ $ticket->jenis_tiket == 'online'
                                    ? 'text-blue-600'
                                    : 'text-amber-600' }}">

                                {{ ucfirst($ticket->jenis_tiket) }}

                            </p>

                        </div>

                    </td>

                    <!-- JUMLAH -->
                    <td class="px-6 py-5 text-center">

                        <p class="font-semibold text-gray-900">

                            {{ $ticket->jenis_tiket == 'online'
                                ? $ticket->jumlah_tiket
                                : $ticket->jumlah_pengunjung }}

                        </p>

                    </td>

                    <!-- FREKUENSI -->
                    <td class="px-6 py-5 text-center">

                        <span class="inline-flex px-3 py-1 rounded-full
                            bg-gray-100 text-gray-700
                            text-xs font-medium">

                            {{ $ticket->frekuensi ?? '-' }}

                        </span>

                    </td>

                    <!-- TANGGAL KUNJUNGAN -->
                    <td class="px-6 py-5 text-center">

                        <p class="text-sm font-medium text-gray-800">

                            {{ \Carbon\Carbon::parse($ticket->tanggal_kunjungan)->format('d M Y') }}

                        </p>

                    </td>

                    <!-- AKSI -->
                    <td class="px-6 py-5 text-center">

                        <a href="{{ route('admin.pengunjung.show', $ticket->id) }}"
                            class="inline-flex items-center px-4 py-2 rounded-xl
                            border border-gray-200
                            hover:bg-gray-50
                            text-sm font-medium text-gray-700 transition">

                            Detail

                        </a>

                    </td>

                </tr>

                    @empty

                    <tr>

                        <td colspan="8" class="px-6 py-16">

                            <div class="max-w-md mx-auto text-center">

                                <!-- ICON -->
                                <div class="flex justify-center mb-4">

                                    <i data-lucide="search-x"
                                        class="w-12 h-12 text-gray-300">
                                    </i>

                                </div>

                                <!-- TITLE -->
                                <h3 class="text-xl font-semibold text-gray-900">

                                    Tidak Ada Hasil Pencarian

                                </h3>

                                <!-- DESC -->
                                <p class="mt-2 text-sm text-gray-500 leading-6">

                                    Tidak ditemukan data pengunjung yang sesuai
                                    dengan filter yang dipilih.

                                </p>

                                <!-- FILTER INFO -->
                                <div class="mt-5 text-xs text-gray-400 space-y-1">

                                    @if(request('search'))
                                        <p>Kata Kunci: <span class="font-medium">{{ request('search') }}</span></p>
                                    @endif

                                    @if(request('tanggal'))
                                        <p>Tanggal: <span class="font-medium">{{ request('tanggal') }}</span></p>
                                    @endif

                                    @if(request('provinsi'))
                                        <p>Provinsi: <span class="font-medium">{{ request('provinsi') }}</span></p>
                                    @endif

                                    @if(request('jenis_tiket'))
                                        <p>Jenis Tiket: <span class="font-medium">{{ ucfirst(request('jenis_tiket')) }}</span></p>
                                    @endif

                                </div>

                                <!-- BUTTON -->
                                <div class="mt-6">

                                    <a href="{{ route('admin.pengunjung') }}"
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
        @if($tickets->hasPages())

        <div class="px-4 md:px-6 py-5 border-t border-gray-100 overflow-x-auto">

            {{ $tickets->links() }}

        </div>

        @endif

    </div>

</div>

@endsection