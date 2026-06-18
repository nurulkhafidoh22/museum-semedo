@extends('layouts.admin')

@section('content')

<div class="p-6 bg-[#f5f7fb] min-h-screen space-y-8">

    <!-- ===================================================== -->
    <!-- HEADER -->
    <!-- ===================================================== -->

    <div class="flex flex-col xl:flex-row
    xl:items-center
    xl:justify-between
    gap-6">

    <!-- TITLE -->
    <div>

        <p class="text-[11px]
            tracking-[0.25em]
            uppercase
            text-[#0f766e]
            font-semibold mb-2">

            Ticket Statistics

        </p>

        <h1 class="text-3xl font-bold text-gray-900 leading-tight">
            Statistik Tiket
        </h1>

        <p class="text-sm text-gray-500 mt-2">
            Analisis distribusi dan performa penggunaan tiket museum
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
                Periode Statistik
            </h3>

        </div>

        <form method="GET">

            <div class="flex flex-wrap items-end gap-3">

                <!-- TANGGAL MULAI -->
                <div>
                    <label class="block text-xs text-gray-500 mb-1">
                        Tanggal Mulai
                    </label>

                    <input
                        type="date"
                        name="start_date"
                        value="{{ $start }}"
                        class="border border-gray-200
                        rounded-lg
                        px-3 py-2
                        text-sm
                        focus:ring-0
                        focus:border-[#0f766e]">
                </div>

                <!-- TANGGAL AKHIR -->
                <div>
                    <label class="block text-xs text-gray-500 mb-1">
                        Tanggal Akhir
                    </label>

                    <input
                        type="date"
                        name="end_date"
                        value="{{ $end }}"
                        class="border border-gray-200
                        rounded-lg
                        px-3 py-2
                        text-sm
                        focus:ring-0
                        focus:border-[#0f766e]">
                </div>

                <!-- BUTTON -->
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

                        <i data-lucide="filter" class="w-4 h-4"></i>
                        Terapkan

                    </button>

                    <a
                        href="{{ route('admin.statistik') }}"
                        class="inline-flex items-center gap-2
                        px-4 py-2
                        rounded-lg
                        border border-gray-300
                        text-gray-700
                        text-sm font-medium
                        hover:bg-gray-100
                        transition">

                        <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                        Reset

                    </a>

                </div>

            </div>

        </form>

    </div>

</div>


    <!-- ===================================================== -->
    <!-- SUMMARY CARD -->
    <!-- ===================================================== -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

        <!-- TOTAL -->
        <div class="rounded-2xl border border-cyan-100
            bg-cyan-50/60 p-5">

            <p class="text-sm text-gray-600">
                Total Tiket
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mt-2">
                {{ $totalTiket }}
            </h2>

            <p class="text-xs text-cyan-700 mt-4">
                Total tiket pada periode terpilih
            </p>

        </div>

        <!-- ONLINE -->
        <div class="rounded-2xl border border-blue-100
            bg-blue-50/60 p-5">

            <p class="text-sm text-gray-600">
                Tiket Online
            </p>

            <h2 class="text-3xl font-bold text-[#2563eb] mt-2">
                {{ $tiketOnline }}
            </h2>

            <p class="text-xs text-blue-700 mt-4">
                Pemesanan melalui website
            </p>

        </div>

        <!-- OFFLINE -->
        <div class="rounded-2xl border border-amber-100
            bg-amber-50/60 p-5">

            <p class="text-sm text-gray-600">
                Tiket Offline
            </p>

            <h2 class="text-3xl font-bold text-[#d97706] mt-2">
                {{ $tiketOffline }}
            </h2>

            <p class="text-xs text-amber-700 mt-4">
                Pembelian langsung di museum
            </p>

        </div>

        <!-- RATIO -->
        <div class="rounded-2xl p-5
            bg-gradient-to-br from-[#062b30] to-[#0b3d45]
            text-white">

            <p class="text-sm text-cyan-100">
                Dominasi Online
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $onlinePercentage }}%
            </h2>

            <p class="text-xs text-cyan-100 mt-4">
                Rasio pembelian tiket online
            </p>

        </div>

    </div>

    <!-- ===================================================== -->
    <!-- EMPTY STATE -->
    <!-- ===================================================== -->

    @if(count($trenTiket) == 0)

    <div class="bg-white border border-gray-200
        rounded-3xl py-20 px-6">

        <div class="max-w-md mx-auto text-center">

            <!-- ICON -->
            <div class="flex justify-center mb-5">

                <i data-lucide="ticket"
                    class="w-12 h-12 text-gray-300">
                </i>

            </div>

            <!-- TITLE -->
            <h2 class="text-xl font-semibold text-gray-900">

                Data Statistik Tidak Tersedia

            </h2>

            <!-- DESCRIPTION -->
            <p class="mt-2 text-sm text-gray-500 leading-6">

                Tidak ditemukan data penjualan atau
                penggunaan tiket yang sesuai dengan
                filter yang dipilih.

            </p>

            <!-- FILTER INFO -->
            <div class="mt-5 text-xs text-gray-400 space-y-1">

                @if(request('start_date'))
                    <p>
                        Tanggal Awal:
                        <span class="font-medium">
                            {{ request('start_date') }}
                        </span>
                    </p>
                @endif

                @if(request('end_date'))
                    <p>
                        Tanggal Akhir:
                        <span class="font-medium">
                            {{ request('end_date') }}
                        </span>
                    </p>
                @endif

                @if(request('jenis_tiket'))
                    <p>
                        Jenis Tiket:
                        <span class="font-medium">
                            {{ ucfirst(request('jenis_tiket')) }}
                        </span>
                    </p>
                @endif

            </div>

            <!-- BUTTON -->
            <div class="mt-6">

                <a href="{{ route('admin.statistik') }}"
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

    </div>

    @else

    <!-- ===================================================== -->
    <!-- CHART -->
    <!-- ===================================================== -->

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- LINE -->
        <div class="xl:col-span-2 bg-white border border-gray-200 rounded-3xl p-6 md:p-8">

            <div class="mb-6">

                <h2 class="text-xl font-semibold text-gray-900">
                    Tren Tiket
                </h2>

                <p class="text-sm text-gray-500 mt-2">
                    Aktivitas distribusi tiket berdasarkan waktu
                </p>

            </div>

            <div class="relative h-[300px] md:h-[350px]">
                <canvas id="trenChart"></canvas>
            </div>

        </div>

        <!-- DONUT -->
        <div class="bg-white border border-gray-200
            rounded-3xl p-6">

            <div class="mb-6">

                <h2 class="text-xl font-semibold text-gray-900">
                    Distribusi Tiket
                </h2>

                <p class="text-sm text-gray-500 mt-2">
                    Perbandingan tiket online dan offline
                </p>

            </div>

            <div class="relative h-[280px] md:h-[340px]">
                <canvas id="jenisChart"></canvas>
            </div>

        </div>

    </div>

    @endif

</div>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    // ===============================
    // 📈 DATA TREN
    // ===============================
    const trenData = @json($trenTiket);

    if (!trenData || trenData.length === 0) {
        console.warn('Data tren kosong');
        return;
    }

    const labels = trenData.map(item => {
        const date = new Date(item.tanggal);
        return date.toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'short'
        });
    });

    const values = trenData.map(item => item.total);

    const ctx = document.getElementById('trenChart');

    if (!ctx) {
        console.error('Canvas trenChart tidak ditemukan');
        return;
    }

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Tiket',
                data: values,
                borderColor: '#0f2a2c',
                backgroundColor: 'rgba(30, 202, 211, 0.15)',
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#1ecad3'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#0f2a2c',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    padding: 10,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return context.raw + ' tiket';
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // ===============================
    // 🥧 PIE CHART JENIS TIKET
    // ===============================
    const jenisData = @json($jenisTiket);

    if (jenisData && jenisData.length > 0) {

        const jenisLabels = jenisData.map(item => item.jenis_tiket);
        const jenisValues = jenisData.map(item => item.total);

        const ctxPie = document.getElementById('jenisChart');

        if (ctxPie) {
            new Chart(ctxPie, {
                type: 'doughnut',
                data: {
                    labels: jenisLabels,
                    datasets: [{
                        data: jenisValues,
                        backgroundColor: [
                            '#1ecad3', // online
                            '#0f2a2c'  // offline
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.raw + ' tiket';
                                }
                            }
                        }
                    }
                }
            });
        }
    }

});
</script>
@endpush
@endsection