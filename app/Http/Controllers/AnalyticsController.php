<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        $query = Ticket::query();

        /*
        |--------------------------------------------------------------------------
        | FILTER
        |--------------------------------------------------------------------------
        */

        if (request('start_date') && request('end_date')) {

            $query->whereBetween('tanggal_kunjungan', [
                request('start_date'),
                request('end_date')
            ]);
        }

        if (request('filter')) {

            if (request('filter') == 'hari_ini') {

                $query->whereDate(
                    'tanggal_kunjungan',
                    now()->toDateString()
                );
            }

            if (request('filter') == '7_hari') {

                $query->whereBetween('tanggal_kunjungan', [
                    now()->subDays(6)->toDateString(),
                    now()->toDateString()
                ]);
            }

            if (request('filter') == 'bulan_ini') {

                $query->whereMonth(
                    'tanggal_kunjungan',
                    now()->month
                )->whereYear(
                    'tanggal_kunjungan',
                    now()->year
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | TOTAL VISITORS
        |--------------------------------------------------------------------------
        */

        $totalVisitors = (clone $query)
            ->select(DB::raw("
                SUM(
                    CASE
                        WHEN jenis_tiket = 'online'
                        THEN jumlah_tiket
                        ELSE jumlah_pengunjung
                    END
                ) as total
            "))
            ->value('total') ?? 0;

        $onlineVisitors = (clone $query)
            ->where('jenis_tiket', 'online')
            ->sum('jumlah_tiket');

        $offlineVisitors = (clone $query)
            ->where('jenis_tiket', 'offline')
            ->sum('jumlah_pengunjung');

        /*
        |--------------------------------------------------------------------------
        | TREN
        |--------------------------------------------------------------------------
        */

        $trend = (clone $query)
            ->select(
                DB::raw('DATE(tanggal_kunjungan) as date'),
                DB::raw("
                    SUM(
                        CASE
                            WHEN jenis_tiket = 'online'
                            THEN jumlah_tiket
                            ELSE jumlah_pengunjung
                        END
                    ) as total
                ")
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | DEMOGRAFI
        |--------------------------------------------------------------------------
        */

        $tipePengunjung = (clone $query)
            ->select(
                'kategori_pengunjung',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('kategori_pengunjung')
            ->pluck('total', 'kategori_pengunjung');

        $tipeKunjungan = (clone $query)
            ->select(
                'tipe_kunjungan',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('tipe_kunjungan')
            ->pluck('total', 'tipe_kunjungan');

        $frekuensi = (clone $query)
            ->select(
                'frekuensi',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('frekuensi')
            ->pluck('total', 'frekuensi');

        /*
        |--------------------------------------------------------------------------
        | WILAYAH
        |--------------------------------------------------------------------------
        */

        $provinsi = (clone $query)
            ->select(
                'provinsi',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('provinsi')
            ->orderByDesc('total')
            ->limit(10)
            ->pluck('total', 'provinsi');

        $kabupaten = (clone $query)
            ->select(
                'kabupaten',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('kabupaten')
            ->orderByDesc('total')
            ->limit(5)
            ->pluck('total', 'kabupaten');

        /*
        |--------------------------------------------------------------------------
        | ANALYTICS SUMMARY
        |--------------------------------------------------------------------------
        */

        $averageVisitors = round(
            $totalVisitors / max($trend->count(), 1)
        );

        $topVisitType = $tipeKunjungan
            ->sortDesc()
            ->keys()
            ->first() ?? 'Tidak diketahui';

        /*
        |--------------------------------------------------------------------------
        | TOP INSIGHT
        |--------------------------------------------------------------------------
        */

        $topProvinsi = $provinsi->keys()->first() ?? '-';

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('admin.analytics', [

            'trend' => $trend,

            'tipePengunjung' => $tipePengunjung,
            'tipeKunjungan' => $tipeKunjungan,
            'frekuensi' => $frekuensi,

            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,

            'totalVisitors' => $totalVisitors,
            'onlineVisitors' => $onlineVisitors,
            'offlineVisitors' => $offlineVisitors,

            'topProvinsi' => $topProvinsi,
            'averageVisitors' => $averageVisitors,
            'topVisitType' => $topVisitType,

        ]);
    }
}