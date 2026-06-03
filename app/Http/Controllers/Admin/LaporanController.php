<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // =====================================================
        // FILTER
        // =====================================================

        $start = $request->start_date;
        $end   = $request->end_date;
        $print = $request->print;

        if (!$start || !$end) {

            $start = now()->subDays(7)->toDateString();
            $end   = now()->toDateString();

        }


        // =====================================================
        // BASE QUERY
        // =====================================================

        $baseQuery = Ticket::whereBetween(
            'tanggal_kunjungan',
            [$start, $end]
        );

        $query = (clone $baseQuery)->latest();


        // =====================================================
        // DATA TABEL
        // =====================================================

        if ($print) {

            $tickets = $query->get();

        } else {

            $tickets = $query
                ->paginate(10)
                ->withQueryString();

        }


        // =====================================================
        // SUMMARY
        // =====================================================

        $total = (clone $baseQuery)
            ->sum('jumlah_tiket');

        $online = (clone $baseQuery)
            ->where('jenis_tiket', 'online')
            ->sum('jumlah_tiket');

        $offline = (clone $baseQuery)
            ->where('jenis_tiket', 'offline')
            ->sum('jumlah_tiket');


        // =====================================================
        // DATA BULANAN SESUAI FILTER
        // =====================================================

        $monthly = Ticket::whereBetween(
                'tanggal_kunjungan',
                [$start, $end]
            )
            ->select(
                DB::raw('YEAR(tanggal_kunjungan) as tahun'),
                DB::raw('MONTH(tanggal_kunjungan) as bulan'),
                DB::raw('SUM(jumlah_tiket) as total')
            )
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get();


        // =====================================================
        // FORMAT BULANAN
        // =====================================================

        $laporanBulanan = [];

        foreach ($monthly as $data) {

            $laporanBulanan[$data->tahun][$data->bulan]
                = $data->total;

        }


        // =====================================================
        // FORMAT KUMULATIF
        // =====================================================

        $laporanKumulatif = [];

        foreach ($laporanBulanan as $tahun => $bulanData) {

            $totalBerjalan = 0;

            for ($i = 1; $i <= 12; $i++) {

                $nilai = $bulanData[$i] ?? 0;

                if (!isset($bulanData[$i])) {

                    $laporanKumulatif[$tahun][$i] = null;
                    continue;

                }

                $totalBerjalan += $nilai;

                $laporanKumulatif[$tahun][$i]
                    = $totalBerjalan;
            }
        }


        // =====================================================
        // DATA CHART
        // =====================================================

        $chartBulanan = [];
        $chartKumulatif = [];

        foreach ($laporanBulanan as $tahun => $bulanData) {

            $chartBulanan[$tahun] = [];

            for ($i = 1; $i <= 12; $i++) {

                $chartBulanan[$tahun][]
                    = $bulanData[$i] ?? 0;
            }
        }

        foreach ($laporanKumulatif as $tahun => $bulanData) {

            $chartKumulatif[$tahun] = [];

            for ($i = 1; $i <= 12; $i++) {

                $chartKumulatif[$tahun][]
                    = $bulanData[$i] ?? 0;
            }
        }


        // =====================================================
        // ANALISIS WILAYAH
        // =====================================================

        $analisisWilayah = (clone $baseQuery)
            ->select(
                'provinsi',
                DB::raw('SUM(jumlah_tiket) as total')
            )
            ->groupBy('provinsi')
            ->orderByDesc('total')
            ->get();


        // =====================================================
        // ANALISIS USIA
        // =====================================================

        $analisisUsia = (clone $baseQuery)
            ->select(
                'kategori_umur',
                DB::raw('SUM(jumlah_tiket) as total')
            )
            ->groupBy('kategori_umur')
            ->orderByDesc('total')
            ->get();


        // =====================================================
        // ANALISIS FREKUENSI
        // =====================================================

        $analisisFrekuensi = (clone $baseQuery)
            ->select(
                'frekuensi',
                DB::raw('SUM(jumlah_tiket) as total')
            )
            ->groupBy('frekuensi')
            ->orderByDesc('total')
            ->get();


        // =====================================================
        // ANALISIS INSTANSI
        // =====================================================

        $analisisInstansi = (clone $baseQuery)
            ->select(
                'instansi',
                DB::raw('SUM(jumlah_tiket) as total')
            )
            ->whereNotNull('instansi')
            ->where('instansi', '!=', '')
            ->groupBy('instansi')
            ->orderByDesc('total')
            ->limit(10)
            ->get();


        // =====================================================
        // EMPTY STATE CHART
        // =====================================================

        $chartKosong = empty($chartBulanan);


        // =====================================================
        // RETURN VIEW
        // =====================================================

        return view('admin.laporan', compact(
            'tickets',
            'total',
            'online',
            'offline',
            'start',
            'end',
            'laporanBulanan',
            'laporanKumulatif',
            'chartBulanan',
            'chartKumulatif',
            'analisisWilayah',
            'analisisUsia',
            'analisisFrekuensi',
            'analisisInstansi',
            'chartKosong',
            'print'
        ));
    }


    // =====================================================
    // EXPORT PDF
    // =====================================================

    public function exportPdf(Request $request)
    {
        $start = $request->start_date;
        $end   = $request->end_date;

        if (!$start || !$end) {

            $start = now()->subDays(7)->toDateString();
            $end   = now()->toDateString();

        }


        // =====================================================
        // BASE QUERY PDF
        // =====================================================

        $baseQuery = Ticket::whereBetween(
            'tanggal_kunjungan',
            [$start, $end]
        );

        $data = (clone $baseQuery)->latest()->get();


        // =====================================================
        // SUMMARY PDF
        // =====================================================

        $total = (clone $baseQuery)
            ->sum('jumlah_tiket');

        $online = (clone $baseQuery)
            ->where('jenis_tiket', 'online')
            ->sum('jumlah_tiket');

        $offline = (clone $baseQuery)
            ->where('jenis_tiket', 'offline')
            ->sum('jumlah_tiket');


        // =====================================================
        // ANALISIS WILAYAH PDF
        // =====================================================

        $analisisWilayah = (clone $baseQuery)
            ->select(
                'provinsi',
                DB::raw('SUM(jumlah_tiket) as total')
            )
            ->groupBy('provinsi')
            ->orderByDesc('total')
            ->get();


        // =====================================================
        // ANALISIS USIA PDF
        // =====================================================

        $analisisUsia = (clone $baseQuery)
            ->select(
                'kategori_umur',
                DB::raw('SUM(jumlah_tiket) as total')
            )
            ->groupBy('kategori_umur')
            ->orderByDesc('total')
            ->get();


        // =====================================================
        // ANALISIS FREKUENSI PDF
        // =====================================================

        $analisisFrekuensi = (clone $baseQuery)
            ->select(
                'frekuensi',
                DB::raw('SUM(jumlah_tiket) as total')
            )
            ->groupBy('frekuensi')
            ->orderByDesc('total')
            ->get();


        // =====================================================
        // ANALISIS INSTANSI PDF
        // =====================================================

        $analisisInstansi = (clone $baseQuery)
            ->select(
                'instansi',
                DB::raw('SUM(jumlah_tiket) as total')
            )
            ->whereNotNull('instansi')
            ->where('instansi', '!=', '')
            ->groupBy('instansi')
            ->orderByDesc('total')
            ->limit(10)
            ->get();


        // =====================================================
        // EXPORT PDF
        // =====================================================

        $pdf = Pdf::loadView('admin.laporan-pdf', [

            'data' => $data,
            'total' => $total,
            'online' => $online,
            'offline' => $offline,
            'start' => $start,
            'end' => $end,

            'analisisWilayah' => $analisisWilayah,
            'analisisUsia' => $analisisUsia,
            'analisisFrekuensi' => $analisisFrekuensi,
            'analisisInstansi' => $analisisInstansi,

        ])->setPaper('A4', 'portrait');

        return $pdf->download('laporan-kunjungan.pdf');
    }
}