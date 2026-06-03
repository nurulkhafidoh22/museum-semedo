<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\Admin\ValidationController;
use App\Http\Controllers\Admin\StatistikController;
use App\Http\Controllers\Admin\LaporanController;
use App\Exports\PengunjungExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\KoleksiController;

/*
|--------------------------------------------------------------------------
| HALAMAN BERANDA
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('pages.home');
})->name('home');

/*
|--------------------------------------------------------------------------
| Halaman Pilihan Tiket
|--------------------------------------------------------------------------
*/

// Halaman memilih tipe tiket
Route::get('/tiket', function () {
    return view('pages.tiket-index');
})->name('tiket.index');

// Form tiket online
Route::get('/tiket/online', function () {
    return view('pages.tiket-online');
})->name('tiket.online');

// Form tiket offline
Route::get('/tiket/offline', function () {
    return view('pages.tiket-offline');
});

// Simpan tiket
Route::post('/tiket/store', [TicketController::class, 'store'])
    ->name('tiket.store');

// Detail tiket + QR
Route::get('/tiket/detail/{id}', [TicketController::class, 'show'])
    ->name('tiket.show');

// Halaman sukses universal (online & offline)
Route::get('/tiket/success/{id}', function ($id) {
    $ticket = App\Models\Ticket::findOrFail($id);
    return view('pages.success', compact('ticket'));
})->name('tiket.success');

// Cetak tiket (print view)
Route::get('/tiket/print/{id}', [TicketController::class, 'print'])
    ->name('tiket.print');


/*
|--------------------------------------------------------------------------
| Pembayaran (Midtrans)
|--------------------------------------------------------------------------
*/

// Mulai pembayaran
Route::get('/payment/start/{id}', [PaymentController::class, 'start'])
    ->name('payment.start');

// Callback server-to-server
Route::post('/payment/callback', [PaymentController::class, 'callback'])
    ->name('payment.callback');

// Halaman sukses
Route::get('/payment/success', [PaymentController::class, 'success'])
    ->name('payment.success');


/*
|--------------------------------------------------------------------------
| Dashboard Setelah Login (Redirect)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {

    $user = request()->user(); //

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'petugas') {
        return redirect('/scan');
    }

    return redirect('/');
})
->middleware(['auth'])
->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile (Laravel Breeze)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route auth bawaan breeze
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| ADMIN AREA (Harus Login)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth','role:admin'])
    ->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');

    // Pengunjung
    Route::get('/pengunjung', [VisitorController::class, 'index'])
        ->name('pengunjung');

    // EXPORT pengunjung
    Route::get('/pengunjung/export', function (Request $request) {
        return Excel::download(
            new PengunjungExport($request),
            'data_pengunjung.xlsx'
        );
    })->name('pengunjung.export');

    // PARAMETER
    Route::get('/pengunjung/{id}', [VisitorController::class, 'show'])
        ->name('pengunjung.show');

    // Analitik
    Route::get('/analytics', [AnalyticsController::class, 'index'])
        ->name('analytics');

    // VALIDASI TIKET
    Route::get('/validasi', [ValidationController::class, 'index'])
        ->name('validasi');

    Route::get('/validasi/export', [ValidationController::class, 'export'])
        ->name('validasi.export');

    //STATISTIK TIKET
    Route::get('/statistik', [StatistikController::class, 'index'])
    ->name('statistik');

    //LAPORAN
    Route::get('/laporan', [LaporanController::class, 'index'])
    ->name('laporan');

    Route::get('/laporan/pdf', [LaporanController::class, 'exportPdf'])
    ->name('laporan.pdf');
});

/*
|--------------------------------------------------------------------------
| PETUGAS (SCAN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:petugas'])->group(function () {

    Route::get('/scan', function () {
        return view('petugas.scan');
    });

});

Route::post('/validate-ticket', [TicketController::class, 'validateTicket'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Tentang
|--------------------------------------------------------------------------
*/
Route::view('/tentang', 'pages.tentang')->name('tentang');

    /*
|--------------------------------------------------------------------------
| Informasi
|--------------------------------------------------------------------------
*/
Route::view('/informasi', 'pages.informasi')->name('informasi');

    /*
|--------------------------------------------------------------------------
| Koleksi
|--------------------------------------------------------------------------
*/
Route::get('/koleksi', [KoleksiController::class, 'index'])
    ->name('koleksi');

Route::get(
    '/koleksi/{slug}',
    [KoleksiController::class, 'show']
)->name('koleksi.detail');