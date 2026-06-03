@extends('layouts.admin')

@section('content')

<div class="p-6 bg-[#f5f7fb] min-h-screen space-y-8">

    <!-- ===================================================== -->
    <!-- PAGE HEADER -->
    <!-- ===================================================== -->

    <div class="flex flex-col lg:flex-row
        lg:items-center
        lg:justify-between
        gap-6">

        <!-- TITLE -->
        <div>

            <p class="text-[11px]
                tracking-[0.25em]
                uppercase
                text-[#0f766e]
                font-semibold mb-2">

                Validation Monitoring

            </p>

            <h1 class="text-3xl font-bold text-gray-900">

                Validasi Tiket

            </h1>

            <p class="text-sm text-gray-500 mt-2">

                Monitoring aktivitas scan tiket pengunjung museum

            </p>

        </div>

        <!-- FILTER -->
        <div class="bg-white
            border border-gray-200
            rounded-2xl
            px-4 py-4
            shadow-sm">

            <div class="mb-3">

                <h3 class="text-sm font-semibold text-gray-800">
                    Periode Validasi
                </h3>

            </div>

            <form method="GET">

                <div class="flex flex-wrap items-end gap-3">

                    <div>

                        <label class="block text-xs text-gray-500 mb-1">
                            Tanggal
                        </label>

                        <input
                            type="date"
                            name="date"
                            value="{{ $date }}"
                            class="border border-gray-200
                            rounded-lg
                            px-3 py-2
                            text-sm
                            focus:ring-0
                            focus:border-[#0f766e]">

                    </div>

                    <div class="flex gap-3">

                        <!-- FILTER -->
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

                        <!-- RESET -->
                        <a
                            href="{{ route('admin.validasi') }}"
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

    </div>
    
    <!-- ===================================================== -->
    <!-- VALIDATION STATS -->
    <!-- ===================================================== -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

        <!-- VALID -->
        <div class="bg-emerald-50 border border-emerald-100
            rounded-2xl p-5">

            <p class="text-sm font-medium text-gray-600">
                Valid
            </p>

            <h2 class="text-4xl font-bold text-emerald-700 mt-2">
                {{ $totalValid }}
            </h2>

            <p class="text-xs text-emerald-700 mt-4">
                Tiket berhasil diverifikasi
            </p>

        </div>

        <!-- DUPLICATE -->
        <div class="bg-amber-50 border border-amber-100
            rounded-2xl p-5">

            <p class="text-sm font-medium text-gray-600">
                Duplicate
            </p>

            <h2 class="text-4xl font-bold text-amber-700 mt-2">
                {{ $totalDuplicate }}
            </h2>

            <p class="text-xs text-amber-700 mt-4">
                Tiket telah digunakan sebelumnya
            </p>

        </div>

        <!-- INVALID -->
        <div class="bg-red-50 border border-red-100
            rounded-2xl p-5">

            <p class="text-sm font-medium text-gray-600">
                Invalid
            </p>

            <h2 class="text-4xl font-bold text-red-700 mt-2">
                {{ $totalInvalid }}
            </h2>

            <p class="text-xs text-red-700 mt-4">
                Tiket tidak valid atau tidak ditemukan
            </p>

        </div>

    </div>
    <!-- INFO TANGGAL -->
    <p class="text-xs text-gray-400 mb-2">
        Data hingga {{ \Carbon\Carbon::parse($date)->format('d M Y') }}
    </p>

    <!-- GRAFIK -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

        <!-- DISTRIBUSI -->
        <div class="bg-white border rounded-xl p-4">
            <h2 class="text-sm text-gray-600 mb-3">
                Distribusi Validasi
            </h2>

            <div class="relative h-[220px]">

                <canvas id="validationChart"></canvas>

                @if(($totalValid + $totalDuplicate + $totalInvalid) === 0)
                    <div class="absolute inset-0 flex items-center justify-center">
                        <p class="text-sm text-gray-300">
                            Belum ada aktivitas scan
                        </p>
                    </div>
                @endif

            </div>
        </div>

        <!-- TREN -->
        <div class="bg-white border rounded-xl p-4">
            <h2 class="text-sm text-gray-600 mb-3">
                Tren Validasi (7 Hari)
            </h2>

            <div class="relative h-[220px]">

                <canvas id="trendChart"></canvas>

                @if(empty($trendData) || collect($trendData)->sum() === 0)
                    <div class="absolute inset-0 flex items-center justify-center">
                        <p class="text-sm text-gray-300">
                            Belum ada data tren
                        </p>
                    </div>
                @endif

            </div>
        </div>

    </div>

    <!-- TABLE HEADER -->
    <div class="flex items-center justify-between mb-4">

        <div>

            <h2 class="text-lg font-semibold text-gray-900">
                Riwayat Validasi
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Data aktivitas scan tiket pengunjung
            </p>

        </div>

            <a href="{{ route('admin.validasi.export', ['date' => $date]) }}"
            class="inline-flex items-center gap-2
            px-4 py-2
            rounded-lg
            border border-gray-300
            bg-white
            text-gray-700
            text-sm font-medium
            hover:bg-gray-50
            transition">

            <i data-lucide="download"
                class="w-4 h-4"></i>

            Export Excel

        </a>

    </div>

    <!-- TABLE -->
    <div class="bg-white border rounded-xl overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                    <tr>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Tiket</th>
                        <th class="px-4 py-3 text-left">Waktu</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Petugas</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($validations as $v)

                    <tr class="border-t hover:bg-gray-50 transition">

                        <td class="px-4 py-3 font-medium">
                            {{ $v->ticket->nama ?? '-' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $v->ticket->jenis_tiket ?? '-' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ \Carbon\Carbon::parse($v->scanned_at)->format('d/m/Y H:i') }}
                        </td>

                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded-full
                                {{ $v->status == 'valid'
                                    ? 'bg-green-100 text-green-700'
                                    : ($v->status == 'duplicate'
                                    ? 'bg-yellow-100 text-yellow-700'
                                    : 'bg-red-100 text-red-700') }}">
                                {{ ucfirst($v->status) }}
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            {{ $v->petugas->name ?? '-' }}
                        </td>

                    </tr>

                    @empty

<tr>

    <td colspan="5" class="py-12">

        <div class="max-w-md mx-auto text-center">

            <!-- ICON -->
            <div class="flex justify-center mb-4">

                <i data-lucide="scan-search"
                    class="w-10 h-10 text-gray-300">
                </i>

            </div>

            <!-- TITLE -->
            <h3 class="text-lg font-semibold text-gray-900">

                Belum Ada Aktivitas Validasi

            </h3>

            <!-- DESCRIPTION -->
            <p class="mt-2 text-sm text-gray-500 leading-6">

                Tidak ditemukan aktivitas scan tiket
                pada periode yang dipilih.

            </p>

            <!-- FILTER INFO -->
            @if(request('tanggal'))

                <p class="mt-4 text-xs text-gray-400">

                    Tanggal:
                    <span class="font-medium">

                        {{ request('tanggal') }}

                    </span>

                </p>

            @endif

            <!-- RESET -->
            <div class="mt-5">

                <a href="{{ route('admin.validasi') }}"
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

    </div>

</div>

<!-- CHART.JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // DISTRIBUSI
    const ctx = document.getElementById('validationChart');

    if (ctx) {
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Valid', 'Duplicate', 'Invalid'],
                datasets: [{
                    data: [{{ $totalValid }}, {{ $totalDuplicate }}, {{ $totalInvalid }}],
                    backgroundColor: ['#16a34a','#ca8a04','#dc2626'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '72%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 10, padding: 12 }
                    }
                }
            }
        });
    }

    // TREND
    const trendCtx = document.getElementById('trendChart');

    if (trendCtx) {
        new Chart(trendCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($trendLabels ?? []) !!},
                datasets: [{
                    data: {!! json_encode($trendData ?? []) !!},
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37, 99, 235, 0.08)',
                    tension: 0.35,
                    fill: true,
                    pointRadius: 2,
                    pointHoverRadius: 4,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: { grid: { display: false } },
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });
    }

});
</script>

@endsection