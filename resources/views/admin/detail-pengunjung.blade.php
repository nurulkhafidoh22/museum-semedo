@extends('layouts.admin')

@section('content')

<div class="p-4 md:p-6">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-3">

        <div>
            <h1 class="text-2xl font-semibold text-gray-800">
                Detail Pengunjung
            </h1>

            <p class="text-sm text-gray-500">
                Informasi lengkap data pengunjung museum
            </p>
        </div>

        <a href="{{ route('admin.pengunjung') }}"
            class="w-full sm:w-auto
                inline-flex items-center justify-center gap-2
                px-3 py-2
                rounded-lg
                text-sm font-medium
                text-gray-600
                border border-gray-200
                hover:bg-gray-50
                hover:text-gray-800
                transition">
    
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7" />

            </svg>

            <span>Kembali</span>

        </a>

    </div>

    <!-- IDENTITAS -->
    <div class="bg-white border rounded-xl p-6 mb-6">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <!-- LEFT -->
            <div>

                <h2 class="text-lg md:text-xl
                            font-semibold
                            text-gray-800
                            break-words">
                    {{ $ticket->nama }}
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    {{ ucfirst($ticket->jenis_tiket) }} Ticket
                </p>

            </div>

            <!-- STATUS -->
            <span class="px-3 py-1 rounded-full text-xs font-semibold

                {{ $ticket->status == 'unused'
                    ? 'bg-yellow-100 text-yellow-700'
                    : 'bg-green-100 text-green-700' }}">

                {{ $ticket->status == 'used'
                    ? 'Sudah Digunakan'
                    : 'Belum Digunakan' }}

            </span>

        </div>

    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- INFORMASI PENGUNJUNG -->
        <div class="bg-white border rounded-xl p-6">

            <h2 class="text-sm font-semibold text-gray-600 mb-5">
                Informasi Pengunjung
            </h2>

            <div class="space-y-4 text-sm">

                <!-- KATEGORI TIKET -->
                <div>

                    <p class="text-gray-500 text-xs">
                        Kategori Tiket
                    </p>

                    <p class="font-medium text-gray-800">
                        {{ ucfirst($ticket->kategori) }}
                    </p>

                </div>

                <!-- KATEGORI PENGUNJUNG -->
                <div>

                    <p class="text-gray-500 text-xs">
                        Kategori Pengunjung
                    </p>

                    <p class="font-medium text-gray-800">
                        {{ $ticket->kategori_pengunjung ?? '-' }}
                    </p>

                </div>

                <!-- INSTANSI -->
                @if($ticket->instansi)

                <div>

                    <p class="text-gray-500 text-xs">
                        Instansi / Sekolah
                    </p>

                    <p class="font-medium text-gray-800">
                        {{ $ticket->instansi }}
                    </p>

                </div>

                @endif

                <!-- KATEGORI UMUR -->
                <div>

                    <p class="text-gray-500 text-xs">
                        Kategori Umur
                    </p>

                    <p class="font-medium text-gray-800">
                        {{ $ticket->kategori_umur ?? '-' }}
                    </p>

                </div>

                <!-- FREKUENSI -->
                <div>

                    <p class="text-gray-500 text-xs">
                        Frekuensi Kunjungan
                    </p>

                    <p class="font-medium text-gray-800">
                        {{ $ticket->frekuensi ?? '-' }}
                    </p>

                </div>

            </div>

        </div>

        <!-- DATA WILAYAH -->
        <div class="bg-white border rounded-xl p-6">

            <h2 class="text-sm font-semibold text-gray-600 mb-5">
                Data Wilayah
            </h2>

            <div class="space-y-5 text-sm">

                <!-- PROVINSI -->
                <div>

                    <p class="text-gray-500 text-xs">
                        Provinsi
                    </p>

                    <p class="font-medium text-gray-800">
                        {{ ucfirst($ticket->provinsi) }}
                    </p>

                </div>

                <!-- KABUPATEN -->
                <div>

                    <p class="text-gray-500 text-xs">
                        Kabupaten / Kota
                    </p>

                    <p class="font-medium text-gray-800">
                        {{ $ticket->kabupaten }}
                    </p>

                </div>

            </div>

        </div>

        <!-- INFORMASI TIKET -->
        <div class="bg-white border rounded-xl p-6">

            <h2 class="text-sm font-semibold text-gray-600 mb-5">
                Informasi Tiket
            </h2>

            <div class="space-y-5 text-sm">

                <!-- JENIS TIKET -->
                <div>

                    <p class="text-gray-500 text-xs">
                        Jenis Tiket
                    </p>

                    <span class="inline-flex mt-1 px-2.5 py-1 rounded-full text-xs font-medium

                        {{ $ticket->jenis_tiket == 'online'
                            ? 'bg-blue-100 text-blue-700'
                            : 'bg-yellow-100 text-yellow-700' }}">

                        {{ ucfirst($ticket->jenis_tiket) }}

                    </span>

                </div>

                <!-- JUMLAH -->
                <div>

                    <p class="text-gray-500 text-xs">
                        Jumlah Pengunjung
                    </p>

                    <p class="font-medium text-gray-800">

                        {{ $ticket->jenis_tiket == 'online'
                            ? $ticket->jumlah_tiket
                            : $ticket->jumlah_pengunjung }}

                    </p>

                </div>

                <!-- TANGGAL -->
                <div>

                    <p class="text-gray-500 text-xs">
                        Tanggal Kunjungan
                    </p>

                    <p class="font-medium text-gray-800">
                        {{ \Carbon\Carbon::parse($ticket->tanggal_kunjungan)->format('d/m/Y') }}
                    </p>

                </div>

                <!-- TIPE -->
                @if($ticket->tipe_kunjungan)

                <div>

                    <p class="text-gray-500 text-xs">
                        Tipe Kunjungan
                    </p>

                    <p class="font-medium text-gray-800 capitalize">
                        {{ $ticket->tipe_kunjungan }}
                    </p>

                </div>

                @endif

            </div>

        </div>

        <!-- STATUS TIKET -->
        <div class="bg-white border rounded-xl p-6">

            <h2 class="text-sm font-semibold text-gray-600 mb-5">
                Status Tiket
            </h2>

            <div class="space-y-5 text-sm">

                <!-- HASH -->
                <div>

                    <p class="text-gray-500 text-xs">
                        Kode Tiket
                    </p>

                    <p class="font-mono
                            text-xs md:text-sm
                            text-gray-800
                            break-all">
                        {{ $ticket->hash }}
                    </p>

                </div>

                <!-- PAYMENT -->
                @if($ticket->jenis_tiket == 'online')

                <div>

                    <p class="text-gray-500 text-xs">
                        Status Pembayaran
                    </p>

                    <span class="inline-flex mt-1 px-2.5 py-1 rounded-full text-xs font-medium

                        {{ $ticket->payment_status == 'paid'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-yellow-100 text-yellow-700' }}">

                        {{ strtoupper($ticket->payment_status) }}

                    </span>

                </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection