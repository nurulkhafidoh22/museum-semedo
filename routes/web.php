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
use App\Models\Validation;
use App\Models\WebsitePage;

/*
|--------------------------------------------------------------------------
| HALAMAN BERANDA
|--------------------------------------------------------------------------
*/
Route::get('/', function () {

    $hero = WebsitePage::where(
        'page',
        'beranda'
    )
    ->where(
        'section',
        'hero'
    )
    ->first();

    $footer = WebsitePage::where(
        'page',
        'footer'
    )->get();

    return view(
        'pages.home',
        compact(
            'hero',
            'footer'
        )
    );

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

    $tiket = WebsitePage::where(
        'page',
        'tiket'
    )->get();

    return view(
        'pages.tiket-online',
        compact('tiket')
    );

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

    Route::resource('petugas', \App\Http\Controllers\Admin\PetugasController::class);

    Route::post(
        '/petugas/{petugas}/reset-password',
        [\App\Http\Controllers\Admin\PetugasController::class, 'resetPassword']
    )->name('petugas.reset-password');

    Route::get(
        '/settings',
        [\App\Http\Controllers\Admin\WebsiteSettingController::class, 'index']
    )->name('settings');

    Route::post(
        '/settings/update-home',
        [\App\Http\Controllers\Admin\WebsiteSettingController::class, 'updateHome']
    )->name('settings.update-home');

    Route::post(
        '/settings/update-tentang',
        [\App\Http\Controllers\Admin\WebsiteSettingController::class, 'updateTentang']
    )->name('settings.update-tentang');

    Route::post(
        '/settings/update-informasi',
        [\App\Http\Controllers\Admin\WebsiteSettingController::class, 'updateInformasi']
    )->name('settings.update-informasi');

    Route::post(
        '/settings/update-tiket',
        [\App\Http\Controllers\Admin\WebsiteSettingController::class, 'updateTiket']
    )->name('settings.update-tiket');

    Route::get(
        '/koleksi',
        [\App\Http\Controllers\Admin\KoleksiController::class, 'index']
    )->name('koleksi.index');

    Route::get(
        '/settings/koleksi/create',
        [\App\Http\Controllers\Admin\KoleksiController::class, 'create']
    )->name('settings.koleksi.create');

    Route::post(
        '/settings/koleksi/store',
        [\App\Http\Controllers\Admin\KoleksiController::class, 'store']
    )->name('settings.koleksi.store');

    Route::get(
        '/settings/koleksi/{koleksi}/edit',
        [\App\Http\Controllers\Admin\KoleksiController::class, 'edit']
    )->name('settings.koleksi.edit');

    Route::put(
        '/settings/koleksi/{koleksi}',
        [\App\Http\Controllers\Admin\KoleksiController::class, 'update']
    )->name('settings.koleksi.update');

    Route::delete(
        '/settings/koleksi/{koleksi}',
        [\App\Http\Controllers\Admin\KoleksiController::class, 'destroy']
    )->name('settings.koleksi.destroy');

    Route::post(
        '/settings/update-footer',
        [\App\Http\Controllers\Admin\WebsiteSettingController::class, 'updateFooter']
    )->name('settings.update-footer');
});

/*
|--------------------------------------------------------------------------
| PETUGAS (SCAN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:petugas'])->group(function () {

    Route::get('/scan', function (Request $request) {

    $date = $request->date;

    $query = Validation::with(['ticket', 'petugas']);

    if ($date) {
        $query->whereDate('scanned_at', $date);
    }

    $totalValidasi = $query->count();

    $validations = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('petugas.scan', compact(
        'validations',
        'totalValidasi',
        'date'
    ));
});

});

Route::post('/validate-ticket', [TicketController::class, 'validateTicket'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Tentang
|--------------------------------------------------------------------------
*/
Route::get('/tentang', function () {

    $tentang = WebsitePage::where(
        'page',
        'tentang'
    )->get();

    return view(
        'pages.tentang',
        compact('tentang')
    );

})->name('tentang');

    /*
|--------------------------------------------------------------------------
| Informasi
|--------------------------------------------------------------------------
*/
Route::get('/informasi', function () {

    $informasi = WebsitePage::where(
        'page',
        'informasi'
        )->get();

        $tiket = WebsitePage::where(
            'page',
            'tiket'
        )->get();

        return view(
            'pages.informasi',
            compact(
                'informasi',
                'tiket'
            )
        );

})->name('informasi');

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