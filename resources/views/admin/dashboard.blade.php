@extends('layouts.admin')

@section('content')

<div class="bg-[#f5f7fb]
            min-h-screen
            p-4 md:p-6
            overflow-x-hidden">

    <!-- =========================
    HEADER
    ========================== -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-8">

        <div>

            <p class="text-[11px] tracking-[0.25em] uppercase text-[#0f766e] font-semibold mb-2">
                Museum Analytics
            </p>

            <h1 class="text-3xl font-bold text-gray-900 leading-tight">
                Dashboard Museum Semedo
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Monitoring kunjungan dan aktivitas museum secara realtime
            </p>

        </div>

        <!-- RIGHT -->
        <div class="bg-white
            border border-gray-200
            rounded-2xl
            px-5 py-4
            shrink-0
            lg:min-w-[280px]">

            <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">
                Hari Ini
            </p>

            <h2 class="text-lg font-semibold text-gray-800">
                {{ now()->translatedFormat('l, d F Y') }}
            </h2>

            <div class="flex items-center gap-2 mt-3">

                <div class="w-2 h-2 rounded-full bg-emerald-500"></div>

                <p class="text-xs text-emerald-600 font-medium">
                    Sistem aktif dan berjalan normal
                </p>

            </div>

        </div>

    </div>

    <!-- =========================
    KPI CARDS
    ========================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

        <!-- TOTAL -->
        <div class="bg-white
                    rounded-2xl
                    border border-gray-200
                    p-5 md:p-6">

            <p class="text-sm text-gray-500">
                Pengunjung Hari Ini
            </p>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3">
                {{ $todayVisitors }}
            </h2>

            <p class="text-xs text-gray-400 mt-6">
                Total kunjungan museum hari ini
            </p>

        </div>

        <!-- ONLINE -->
        <div class="bg-white
                    rounded-2xl
                    border border-gray-200
                    p-5 md:p-6">

            <p class="text-sm text-gray-500">
                Tiket Online
            </p>

            <h2 class="text-3xl md:text-4xl font-bold text-[#2563eb] mt-3">
                {{ $online }}
            </h2>

            <p class="text-xs text-gray-400 mt-6">
                Pemesanan melalui website
            </p>

        </div>

        <!-- OFFLINE -->
        <div class="bg-white
                    rounded-2xl
                    border border-gray-200
                    p-5 md:p-6">

            <p class="text-sm text-gray-500">
                Tiket Offline
            </p>

            <h2 class="text-3xl md:text-4xl font-bold text-[#d97706] mt-3">
                {{ $offline }}
            </h2>

            <p class="text-xs text-gray-400 mt-6">
                Pembelian langsung di museum
            </p>

        </div>

        <!-- VALIDASI -->
        <div class="bg-gradient-to-br from-[#062b30] to-[#0b3d45]
                    rounded-2xl
                    p-5 md:p-6
                    text-white
                    relative
                    overflow-hidden">

            <div class="absolute right-0 top-0 w-32 h-32 bg-cyan-400/10 rounded-full -mr-10 -mt-10"></div>

            <p class="text-sm text-cyan-100">
                Validasi Hari Ini
            </p>

            <h2 class="text-3xl md:text-4xl font-bold mt-3">
                {{ $checkedIn }}
            </h2>

            <div class="mt-6 pt-4 border-t border-white/10">

                <div class="flex justify-between items-center text-sm">

                    <span class="text-cyan-100">
                        Belum Masuk
                    </span>

                    <span class="font-semibold">
                        {{ $notCheckedIn }}
                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- =========================
    MAIN GRID
    ========================== -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- =========================
        MAIN CHART
        ========================== -->
        <div class="xl:col-span-2
            bg-white
            rounded-2xl
            border border-gray-200
            p-5 md:p-6">

            <div class="flex items-center justify-between mb-6">

                <div>

                    <p class="text-sm font-semibold text-gray-800">
                        Tren Kunjungan
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        Aktivitas pengunjung museum hari ini
                    </p>

                </div>

                <div class="px-3 py-1 rounded-full bg-cyan-50 text-cyan-700 text-xs font-medium">
                    Realtime
                </div>

            </div>

            <div class="h-[260px] sm:h-[320px]">

                <canvas id="trendChart"></canvas>

            </div>

        </div>

        <!-- =========================
        QUICK INSIGHT
        ========================== -->
        <div class="space-y-6">

            <!-- INSIGHT -->
            <div class="bg-white
                        rounded-2xl
                        border border-gray-200
                        p-5 md:p-6">

                <div class="mb-6">

                    <p class="text-sm font-semibold text-gray-800">
                        Ringkasan Hari Ini
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        Statistik kunjungan museum
                    </p>

                </div>

                @php
                    $total = $online + $offline;
                    $onlinePercent = $total ? round(($online / $total) * 100) : 0;
                    $offlinePercent = $total ? round(($offline / $total) * 100) : 0;
                @endphp

                <div class="space-y-5">

                    <!-- ONLINE -->
                    <div>

                        <div class="flex justify-between text-sm mb-2">

                            <span class="text-gray-600">
                                Online
                            </span>

                            <span class="font-semibold text-blue-600">
                                {{ $onlinePercent }}%
                            </span>

                        </div>

                        <div class="w-full bg-gray-100 rounded-full h-2">

                            <div class="bg-blue-500 h-2 rounded-full"
                                style="width: {{ $onlinePercent }}%">
                            </div>

                        </div>

                    </div>

                    <!-- OFFLINE -->
                    <div>

                        <div class="flex justify-between text-sm mb-2">

                            <span class="text-gray-600">
                                Offline
                            </span>

                            <span class="font-semibold text-amber-600">
                                {{ $offlinePercent }}%
                            </span>

                        </div>

                        <div class="w-full bg-gray-100 rounded-full h-2">

                            <div class="bg-amber-500 h-2 rounded-full"
                                style="width: {{ $offlinePercent }}%">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- QUICK INFO -->
            <div class="bg-white
                        rounded-2xl
                        border border-gray-200
                        p-5 md:p-6">

                <div class="mb-5">

                    <p class="text-sm font-semibold text-gray-800">
                        Informasi Sistem
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        Status operasional museum
                    </p>

                </div>

                <div class="space-y-4">

                    <div class="flex justify-between items-center gap-4">

                        <span class="text-sm text-gray-500">
                            Total Tiket
                        </span>

                        <span class="font-semibold text-gray-800">
                            {{ $todayVisitors }}
                        </span>

                    </div>

                    <div class="flex justify-between items-center gap-4">

                        <span class="text-sm text-gray-500">
                            Validasi Berhasil
                        </span>

                        <span class="font-semibold text-emerald-600">
                            {{ $checkedIn }}
                        </span>

                    </div>

                    <div class="flex justify-between items-center gap-4">

                        <span class="text-sm text-gray-500">
                            Menunggu Validasi
                        </span>

                        <span class="font-semibold text-amber-600">
                            {{ $notCheckedIn }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- =========================
CHART JS
========================= -->
<script>

document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('trendChart');

    if (ctx) {

        new Chart(ctx, {
            type: 'line',

            data: {
                labels: ['Online', 'Offline', 'Validasi'],

                datasets: [{
                    label: 'Aktivitas Hari Ini',
                    data: [
                        {{ $online }},
                        {{ $offline }},
                        {{ $checkedIn }}
                    ],

                    borderColor: '#06b6d4',
                    backgroundColor: 'rgba(6, 182, 212, 0.08)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#0891b2'
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {

                    y: {
                        beginAtZero: true,

                        grid: {
                            color: '#eef2f7'
                        },

                        ticks: {
                            color: '#94a3b8'
                        }
                    },

                    x: {

                        grid: {
                            display: false
                        },

                        ticks: {
                            color: '#64748b'
                        }
                    }
                }
            }
        });

    }

});

</script>

@endsection