<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $tanggal = $request->tanggal;

        // ================== DATA PROVINSI ==================
        $provinsiMap = [
            'aceh' => 'Aceh',
            'bali' => 'Bali',
            'banten' => 'Banten',
            'bengkulu' => 'Bengkulu',
            'yogyakarta' => 'DI Yogyakarta',
            'gorontalo' => 'Gorontalo',
            'jakarta' => 'DKI Jakarta',
            'jambi' => 'Jambi',
            'jawabarat' => 'Jawa Barat',
            'jawatengah' => 'Jawa Tengah',
            'jawatimur' => 'Jawa Timur',
            'kalbar' => 'Kalimantan Barat',
            'kalteng' => 'Kalimantan Tengah',
            'kalsel' => 'Kalimantan Selatan',
            'kaltim' => 'Kalimantan Timur',
            'kalut' => 'Kalimantan Utara',
            'babel' => 'Kepulauan Bangka Belitung',
            'kepri' => 'Kepulauan Riau',
            'lampung' => 'Lampung',
            'maluku' => 'Maluku',
            'malut' => 'Maluku Utara',
            'ntb' => 'Nusa Tenggara Barat',
            'ntt' => 'Nusa Tenggara Timur',
            'papua' => 'Papua',
            'papuabarat' => 'Papua Barat',
            'papuabaratdaya' => 'Papua Barat Daya',
            'papuapegunungan' => 'Papua Pegunungan',
            'papuaselatan' => 'Papua Selatan',
            'riau' => 'Riau',
            'sulbar' => 'Sulawesi Barat',
            'sulsel' => 'Sulawesi Selatan',
            'sultra' => 'Sulawesi Tenggara',
            'sulteng' => 'Sulawesi Tengah',
            'sulut' => 'Sulawesi Utara',
            'sumbar' => 'Sumatera Barat',
            'sumsel' => 'Sumatera Selatan',
            'sumut' => 'Sumatera Utara',
        ];

        /*
        |--------------------------------------------------------------------------
        | BASE QUERY
        |--------------------------------------------------------------------------
        */

        $baseQuery = Ticket::query()

            // 🔍 SEARCH
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('nama', 'like', "%{$search}%")
                      ->orWhere('provinsi', 'like', "%{$search}%")
                      ->orWhere('kabupaten', 'like', "%{$search}%");

                });

            })

            // 📅 FILTER TANGGAL
            ->when($tanggal, function ($query) use ($tanggal) {

                $query->whereDate('tanggal_kunjungan', $tanggal);

            })

            // 📍 FILTER PROVINSI
            ->when($request->provinsi, function ($query) use ($request) {

                $query->where('provinsi', $request->provinsi);

            })

            // 🎫 FILTER JENIS TIKET
            ->when($request->jenis_tiket, function ($query) use ($request) {

                $query->where('jenis_tiket', $request->jenis_tiket);

            });

        /*
        |--------------------------------------------------------------------------
        | DATA TABEL
        |--------------------------------------------------------------------------
        */

        $tickets = (clone $baseQuery)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        | jumlah pengunjung = jumlah_tiket
        */

        $totalVisitors = (clone $baseQuery)
            ->sum('jumlah_tiket');

        $online = (clone $baseQuery)
            ->where('jenis_tiket', 'online')
            ->sum('jumlah_tiket');

        $offline = (clone $baseQuery)
            ->where('jenis_tiket', 'offline')
            ->sum('jumlah_tiket');

        $today = (clone $baseQuery)
            ->whereDate('tanggal_kunjungan', today())
            ->sum('jumlah_tiket');

        /*
        |--------------------------------------------------------------------------
        | DROPDOWN PROVINSI
        |--------------------------------------------------------------------------
        */

        $provinsiList = array_values($provinsiMap);

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('admin.data-pengunjung', compact(
            'tickets',
            'totalVisitors',
            'online',
            'offline',
            'today',
            'provinsiList',
            'provinsiMap'
        ));
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('admin.detail-pengunjung', compact('ticket'));
    }
}