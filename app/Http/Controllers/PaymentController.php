<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\WebsitePage;

class PaymentController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.sanitization');
        Config::$is3ds = config('midtrans.3ds');
    }

    // ===============================
    // 1. MULAI PEMBAYARAN (SNAP TOKEN)
    // ===============================
    public function start($id)
    {
        $ticket = Ticket::findOrFail($id);

        // HARGA
        $tiketCms = WebsitePage::where(
            'page',
            'tiket'
        )->get();

        $hargaDewasa = (int) optional(
            $tiketCms->where('section', 'harga_dewasa')->first()
        )->title;

        $hargaWna = (int) optional(
            $tiketCms->where('section', 'harga_wna')->first()
        )->title;

        $harga = $ticket->kategori === 'mancanegara'
            ? ($hargaWna ?: 20000)
            : ($hargaDewasa ?: 8000);

        // TOTAL PEMBAYARAN
        $total = $harga * $ticket->jumlah_tiket;

        // DATA TRANSAKSI MIDTRANS
        $params = [
            'transaction_details' => [
                'order_id'     => 'ORDER-' . $ticket->id . '-' . time(),
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => $ticket->nama,
            ],
            // TAMBAH RETURN URL Biar Setelah Sukses Midtrans Redirect
            'callbacks' => [
                'finish' => route('payment.success'),
            ],

        ];

        // SNAP TOKEN
        $snapToken = Snap::getSnapToken($params);

        return view('pages.payment', compact('ticket', 'snapToken', 'harga', 'total'));
    }

    // ==============================================
    // 2. CALLBACK MIDTRANS (PENTING! UPDATE STATUS)
    // ==============================================
    public function callback(Request $request)
    {
        $notif = $request->all();

        $orderId = $notif['order_id'];
        $status  = $notif['transaction_status']; // settlement, capture, pending, deny, cancel, expire

        // Pisahkan untuk ambil ID tiket
        // FORMAT ORDER-ID kamu: ORDER-<ticket_id>-time()
        $parts = explode('-', $orderId);
        $ticketId = $parts[1];

        $ticket = Ticket::find($ticketId);

        if (!$ticket) {
            return response()->json(['message' => 'ticket not found'], 404);
        }

        // STATUS DARI MIDTRANS
        if ($status === 'settlement' || $status === 'capture') {

            $ticket->payment_status = 'paid';

        } elseif ($status === 'pending') {

            $ticket->payment_status = 'pending';

        } else {

            $ticket->payment_status = 'failed';
        }

        $ticket->save();

        return response()->json(['message' => 'callback received']);
    }

    // =======================================================
    // 3. REDIRECT SETELAH PEMBAYARAN SUKSES (HALAMAN USER)
    // =======================================================
    public function success(Request $request)
    {
        $orderId = $request->order_id;

        // Ambil ticket ID dari ORDER-ID
        $parts = explode('-', $orderId);
        $ticketId = $parts[1];

        $ticket = Ticket::find($ticketId);

        return view('pages.success', compact('ticket'));
    }

    // OPSIONAL REDIRECT ERROR
    public function error()
    {
        return view('pages.error');
    }

    // OPSIONAL REDIRECT KETIKA USER TIDAK MENYELESAIKAN PEMBAYARAN
    public function unfinish()
    {
        return view('pages.unfinish');
    }
}