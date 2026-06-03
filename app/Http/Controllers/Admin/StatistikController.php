<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->start_date;
        $end   = $request->end_date;

        // DEFAULT FILTER
        if (!$start && !$end) {
            $start = now()->subDays(7)->toDateString();
            $end   = now()->toDateString();
        }

        $query = DB::table('tickets')
            ->whereBetween('tanggal_kunjungan', [$start, $end]);

        // SUMMARY CARD
        $totalTiket = (clone $query)->sum('jumlah_tiket');

        $tiketOnline = (clone $query)
            ->where('jenis_tiket', 'online')
            ->sum('jumlah_tiket');

        $tiketOffline = (clone $query)
            ->where('jenis_tiket', 'offline')
            ->sum('jumlah_tiket');

        $tiketHariIni = (clone $query)
            ->whereDate('tanggal_kunjungan', now())
            ->sum('jumlah_tiket');

        // TREN
        $trenTiket = (clone $query)
            ->select(
                DB::raw('DATE(tanggal_kunjungan) as tanggal'),
                DB::raw('SUM(jumlah_tiket) as total')
            )
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        // JENIS TIKET
        $jenisTiket = (clone $query)
            ->select(
                'jenis_tiket',
                DB::raw('SUM(jumlah_tiket) as total')
            )
            ->groupBy('jenis_tiket')
            ->get();

        // STATUS
        $statusTiket = (clone $query)
            ->select(
                'status',
                DB::raw('SUM(jumlah_tiket) as total')
            )
            ->groupBy('status')
            ->get();

        $onlinePercentage = $totalTiket > 0
        ? round(($tiketOnline / $totalTiket) * 100)
        : 0;

        return view('admin.statistik', compact(
        'totalTiket',
        'tiketOnline',
        'tiketOffline',
        'tiketHariIni',
        'trenTiket',
        'jenisTiket',
        'statusTiket',
        'onlinePercentage',
        'start',
        'end'
    ));
    }
}