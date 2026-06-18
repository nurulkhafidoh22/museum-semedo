@extends('layouts.admin')

@section('content')

<div class="p-6 bg-[#f5f7fb] min-h-screen space-y-8">

    <!-- ===================================================== -->
    <!-- HEADER -->
    <!-- ===================================================== -->

    <div class="flex flex-col xl:flex-row
            xl:items-start
            xl:justify-between
            gap-6">

        <!-- TITLE -->
        <div>

            <p class="text-[11px]
                tracking-[0.25em]
                uppercase
                text-[#0f766e]
                font-semibold mb-2">

                Museum Analytics

            </p>

            <h1 class="text-3xl font-bold text-gray-900 leading-tight">

                Analitik Pengunjung

            </h1>

            <p class="text-sm text-gray-500 mt-2">

                Analisis data kunjungan dan perilaku pengunjung museum

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

                    Periode Analisis

                </h3>

            </div>

            <form method="GET"
                action="{{ route('admin.analytics') }}">

                <div class="flex flex-wrap items-end gap-3">

                    <!-- TANGGAL MULAI -->
                    <div>

                        <label class="block text-xs text-gray-500 mb-1">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            value="{{ request('start_date') }}"
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
                            value="{{ request('end_date') }}"
                            class="border border-gray-200
                            rounded-lg
                            px-3 py-2
                            text-sm
                            focus:ring-0
                            focus:border-[#0f766e]">

                    </div>

                    <!-- ACTION -->
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
                            href="{{ route('admin.analytics') }}"
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
    <!-- MINI STATISTICS -->
    <!-- ===================================================== -->

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

        <!-- TOTAL PERIODE -->
        <div class="rounded-2xl border border-cyan-100 bg-cyan-50 p-5">

            <p class="text-sm text-gray-600">
                Total Pengunjung
            </p>

            <h2 class="text-3xl font-bold text-gray-900 mt-2">
                {{ $totalVisitors }}
            </h2>

            <p class="text-xs text-cyan-700 mt-4">
                Total kunjungan pada periode terpilih
            </p>

        </div>

        <!-- RATA HARIAN -->
        <div class="rounded-2xl border border-blue-100 bg-blue-50 p-5">

            <p class="text-sm text-gray-600">
                Rata-rata Harian
            </p>

            <h2 class="text-3xl font-bold text-[#2563eb] mt-2">
                {{ $averageVisitors }}
            </h2>

            <p class="text-xs text-blue-700 mt-4">
                Rata-rata pengunjung per hari
            </p>

        </div>

        <!-- PROVINSI -->
        <div class="rounded-2xl border border-amber-100 bg-amber-50 p-5">

            <p class="text-sm text-gray-600">
                Provinsi Dominan
            </p>

            <h2 class="text-2xl font-bold text-[#d97706] mt-2">
                {{ $topProvinsi }}
            </h2>

            <p class="text-xs text-amber-700 mt-4">
                Wilayah pengunjung terbanyak
            </p>

        </div>

        <!-- TIPE -->
        <div class="rounded-2xl p-5
            bg-gradient-to-br from-[#062b30] to-[#0b3d45]
            text-white">

            <p class="text-sm text-cyan-100">
                Tipe Dominan
            </p>

            <h2 class="text-2xl font-bold mt-2">
                {{ $topVisitType }}
            </h2>

            <p class="text-xs text-cyan-100 mt-4">
                Jenis kunjungan paling sering
            </p>

        </div>

    </div>

    <!-- ===================================================== -->
    <!-- EMPTY STATE -->
    <!-- ===================================================== -->

    @if($trend->isEmpty())

    <div class="bg-white border border-gray-200
                rounded-2xl
                p-6 md:p-16">

        <div class="max-w-md mx-auto text-center">

            <!-- ICON -->
            <div class="flex justify-center mb-4">

                <i data-lucide="bar-chart-3"
                    class="w-12 h-12 text-gray-300">
                </i>

            </div>

            <!-- TITLE -->
            <h2 class="text-xl font-semibold text-gray-900">

                Data Analitik Tidak Tersedia

            </h2>

            <!-- DESC -->
            <p class="mt-2 text-sm text-gray-500 leading-6">

                Tidak ditemukan data kunjungan yang sesuai
                dengan filter periode yang dipilih.

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

            <!-- BUTTON -->
            <div class="mt-6">

                <a href="{{ route('admin.analytics') }}"
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
    <!-- HERO TREND -->
    <!-- ===================================================== -->

    <div class="bg-white border border-gray-200
        rounded-3xl p-6">

        <div class="flex flex-col lg:flex-row
            lg:items-start lg:justify-between gap-5 mb-8">

            <div>

                <h2 class="text-xl font-semibold text-gray-900">
                    Tren Kunjungan
                </h2>

                <p class="text-sm text-gray-500 mt-2">
                    Aktivitas pengunjung museum berdasarkan waktu
                </p>

            </div>

            <div class="inline-flex items-center gap-2
                bg-cyan-50 text-cyan-700
                px-4 py-2 rounded-full text-xs font-medium">

                <div class="w-2 h-2 rounded-full bg-cyan-500"></div>

                Realtime Analytics

            </div>

        </div>

        <div class="h-[280px] md:h-[320px]">
            <canvas id="trendChart"></canvas>
        </div>

    </div>

    <!-- ===================================================== -->
    <!-- ANALYTICS GRID -->
    <!-- ===================================================== -->

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

        <!-- FREKUENSI -->
        <div class="bg-white border border-gray-200
            rounded-2xl p-6">

            <h3 class="text-base font-semibold text-gray-900">
                Frekuensi Kunjungan
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Intensitas kunjungan pengunjung museum
            </p>

            <div class="h-[220px] sm:h-[260px] mt-6">
                <canvas id="frekuensiChart"></canvas>
            </div>

        </div>

        <!-- TIPE PENGUNJUNG -->
        <div class="bg-white border border-gray-200
            rounded-2xl p-6">

            <h3 class="text-base font-semibold text-gray-900">
                Kategori Pengunjung
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Distribusi kategori pengunjung
            </p>

            <div class="h-[220px] sm:h-[260px] mt-6">
                <canvas id="tipePengunjungChart"></canvas>
            </div>

        </div>

        <!-- TIPE KUNJUNGAN -->
        <div class="bg-white border border-gray-200
            rounded-2xl p-6">

            <h3 class="text-base font-semibold text-gray-900">
                Tipe Kunjungan
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Individu dan rombongan
            </p>

            <div class="h-[220px] sm:h-[260px] mt-6">
                <canvas id="tipeKunjunganChart"></canvas>
            </div>

        </div>

        <!-- PROVINSI -->
        <div class="bg-white border border-gray-200
            rounded-2xl p-6">

            <h3 class="text-base font-semibold text-gray-900">
                Distribusi Provinsi
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Asal wilayah pengunjung museum
            </p>

            <div class="h-[220px] sm:h-[260px] mt-6">
                <canvas id="provinsiChart"></canvas>
            </div>

        </div>

    </div>

    <!-- ===================================================== -->
    <!-- KABUPATEN -->
    <!-- ===================================================== -->

    <div class="bg-white border border-gray-200
        rounded-2xl p-6">

        <h3 class="text-base font-semibold text-gray-900">
            Top Kabupaten/Kota
        </h3>

        <p class="text-sm text-gray-500 mt-1">
            Wilayah dengan jumlah pengunjung tertinggi
        </p>

        <div class="h-[220px] md:h-[260px] mt-6">
            <canvas id="kabupatenChart"></canvas>
        </div>

    </div>

    @endif

</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const colors = [
        '#3B82F6',
        '#10B981',
        '#F59E0B',
        '#8B5CF6',
        '#14B8A6',
        '#EF4444'
    ];

    const trendData = @json($trend);
    const frekuensi = @json($frekuensi);
    const tipePengunjung = @json($tipePengunjung);
    const tipeKunjungan = @json($tipeKunjungan);
    const provinsi = @json($provinsi);
    const kabupaten = @json($kabupaten);

    // =====================================================
    // TREND CHART
    // =====================================================

    if (trendData.length) {

        new Chart(document.getElementById('trendChart'), {

            type:'line',

            data:{
                labels:trendData.map(i => i.date),

                datasets:[{

                    label:'Pengunjung',

                    data:trendData.map(i => i.total),

                    borderColor:'#0b6b75',

                    backgroundColor:'rgba(11,107,117,0.08)',

                    fill:true,

                    tension:0.45,

                    borderWidth:3,

                    pointBackgroundColor:'#0b6b75',

                    pointRadius:4

                }]
            },

            options:{

                maintainAspectRatio:false,

                plugins:{
                    legend:{display:false}
                },

                scales:{

                    x:{
                        grid:{display:false}
                    },

                    y:{
                        beginAtZero:true,
                        grid:{
                            color:'rgba(0,0,0,0.05)'
                        }
                    }

                }

            }

        });

    }

    // =====================================================
    // DOUGHNUT CHART
    // =====================================================

    function createDoughnut(id, data){

        if(Object.keys(data).length){

            new Chart(document.getElementById(id), {

                type:'doughnut',

                data:{

                    labels:Object.keys(data),

                    datasets:[{

                        data:Object.values(data),

                        backgroundColor:colors,

                        borderWidth:0

                    }]
                },

                options:{

                    maintainAspectRatio:false,

                    cutout:'72%',

                    plugins:{
                    legend:{
                        position: window.innerWidth < 768
                            ? 'bottom'
                            : 'right'
                    }
                }

                }

            });

        }

    }

    createDoughnut('frekuensiChart', frekuensi);
    createDoughnut('tipePengunjungChart', tipePengunjung);
    createDoughnut('tipeKunjunganChart', tipeKunjungan);

    // =====================================================
    // BAR CHART
    // =====================================================

    function createBar(id, data, color){

        if(Object.keys(data).length){

            new Chart(document.getElementById(id), {

                type:'bar',

                data:{

                    labels:Object.keys(data),

                    datasets:[{

                        data:Object.values(data),

                        backgroundColor:color,

                        borderRadius:10

                    }]
                },

                options:{

                    maintainAspectRatio:false,

                    plugins:{
                        legend:{display:false}
                    },

                    scales:{

                        x:{
                            grid:{display:false}
                        },

                        y:{
                            beginAtZero:true,
                            grid:{
                                color:'rgba(0,0,0,0.05)'
                            }
                        }

                    }

                }

            });

        }

    }

    createBar('provinsiChart', provinsi, '#3B82F6');
    createBar('kabupatenChart', kabupaten, '#8B5CF6');

});

</script>

@endpush