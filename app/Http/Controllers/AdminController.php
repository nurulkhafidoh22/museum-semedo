<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Validation;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = now()->toDateString();

        // 🔹 TOTAL PENGUNJUNG (jumlah tiket)
        $todayVisitors = Ticket::whereDate('tanggal_kunjungan', $today)
            ->sum('jumlah_tiket');

        // 🔹 ONLINE
        $online = Ticket::whereDate('tanggal_kunjungan', $today)
            ->where('jenis_tiket', 'online')
            ->sum('jumlah_tiket');

        // 🔹 OFFLINE
        $offline = Ticket::whereDate('tanggal_kunjungan', $today)
            ->where('jenis_tiket', 'offline')
            ->sum('jumlah_tiket');

        // 🔹 SUDAH MASUK
        $checkedIn = Validation::whereDate('scanned_at', $today)
            ->where('status', 'valid')
            ->count();

        // 🔹 BELUM MASUK
        $notCheckedIn = max($todayVisitors - $checkedIn, 0);

        return view('admin.dashboard', compact(
            'todayVisitors',
            'online',
            'offline',
            'checkedIn',
            'notCheckedIn'
        ));
    }
}