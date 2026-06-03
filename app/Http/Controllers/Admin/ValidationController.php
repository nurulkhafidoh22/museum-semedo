<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Validation;
use Illuminate\Http\Request;
use App\Exports\ValidationExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class ValidationController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->date 
            ? Carbon::parse($request->date)->format('Y-m-d')
            : Carbon::today()->format('Y-m-d');

        $query = Validation::with(['ticket', 'petugas']);

        // FILTER TANGGAL
        if ($date) {
            $query->whereDate('scanned_at', $date);
        }

        $validations = $query->latest()->get();

        // STATISTIK
        $totalValid = (clone $query)->where('status', 'valid')->count();
        $totalDuplicate = (clone $query)->where('status', 'duplicate')->count();
        $totalInvalid = (clone $query)->where('status', 'invalid')->count();

        // 📈 DATA TREN HARIAN (7 hari terakhir)
        $baseDate = Carbon::parse($date);

        $trend = Validation::select(
                DB::raw('DATE(scanned_at) as tanggal'),
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween('scanned_at', [
                $baseDate->copy()->subDays(6)->startOfDay(),
                $baseDate->copy()->endOfDay()
            ])
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        // LABEL TANGGAL (7 hari)
        $trendLabels = collect(range(0,6))->map(function($i) use ($baseDate){
            return $baseDate->copy()->subDays(6 - $i)->format('d/m');
        });

        // DATA (ISI 0 JIKA KOSONG)
        $map = $trend->keyBy('tanggal');

        $trendData = collect(range(0,6))->map(function($i) use ($baseDate, $map){
            $key = $baseDate->copy()->subDays(6 - $i)->toDateString();
            return $map[$key]->total ?? 0;
        });

        return view('admin.validasi', compact(
            'validations',
            'date',
            'totalValid',
            'totalDuplicate',
            'totalInvalid',
            'trendLabels',
            'trendData'
        ));
    }

    public function export()
    {
        return Excel::download(new ValidationExport, 'validasi.xlsx');
    }
}