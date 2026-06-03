<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Validation;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Simpan tiket online/offline
     */
    public function store(Request $request)
    {
        $jenis = $request->input('jenis_tiket');

        /*
        |--------------------------------------------------------------------------
        | VALIDATION ONLINE
        |--------------------------------------------------------------------------
        */
        if ($jenis === 'online') {

            $rules = [

                // DATA DASAR
                'nama'                  => 'required|string|max:255',

                'jenis_tiket'           => 'required|in:online,offline',

                'tanggal_kunjungan'     => 'required|date|after_or_equal:today',

                // DEMOGRAFI
                'kategori_pengunjung'   => 'required|in:umum,paud,sd,smp,sma,pt',

                'kategori_umur'         => 'required|string|max:50',

                'instansi'              => 'nullable|string|max:255',

                // WILAYAH
                'provinsi'              => 'required|string|max:100',

                'kabupaten'             => 'required|string|max:100',

                // KUNJUNGAN
                'tipe_kunjungan'        => 'required|in:individu,rombongan',

                'frekuensi'             => 'nullable|in:1,2,3,4',

                // TIKET ONLINE
                'kategori'              => 'required|in:domestik,mancanegara',

                'jumlah_tiket'          => 'required|integer|min:1',
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | VALIDATION OFFLINE
        |--------------------------------------------------------------------------
        */
        else {

            $rules = [

                // DATA DASAR
                'nama'                  => 'required|string|max:255',

                'jenis_tiket'           => 'required|in:online,offline',

                'tanggal_kunjungan'     => 'required|date|after_or_equal:today',

                // DEMOGRAFI
                'kategori_pengunjung'   => 'required|in:umum,paud,sd,smp,sma,pt',

                'kategori_umur'         => 'required|string|max:50',

                'instansi'              => 'nullable|string|max:255',

                // WILAYAH
                'provinsi'              => 'required|string|max:100',

                'kabupaten'             => 'required|string|max:100',

                // KUNJUNGAN
                'tipe_kunjungan'        => 'required|in:individu,rombongan',

                'jumlah_pengunjung'     => 'required|integer|min:1',

                'frekuensi'             => 'nullable|in:1,2,3,4',
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | VALIDATE
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate($rules);

        /*
        |--------------------------------------------------------------------------
        | SINKRONISASI JUMLAH PENGUNJUNG
        |--------------------------------------------------------------------------
        */

        // ONLINE
        if ($jenis === 'online') {

            // jumlah tiket = jumlah pengunjung
            $validated['jumlah_pengunjung'] =
                $validated['jumlah_tiket'];
        }

        // OFFLINE
        else {

            // offline tidak punya jumlah tiket
            $validated['jumlah_tiket'] =
                $validated['jumlah_pengunjung'];

            // default kategori tiket offline
            $validated['kategori'] = 'domestik';
        }

        /*
        |--------------------------------------------------------------------------
        | GENERATE HASH QR
        |--------------------------------------------------------------------------
        */
        $validated['hash'] = Str::random(32);

        /*
        |--------------------------------------------------------------------------
        | STATUS TIKET
        |--------------------------------------------------------------------------
        */
        $validated['status'] = 'unused';

        /*
        |--------------------------------------------------------------------------
        | PAYMENT STATUS
        |--------------------------------------------------------------------------
        */
        $validated['payment_status'] =
            $jenis === 'offline'
                ? 'paid'
                : 'pending';

        /*
        |--------------------------------------------------------------------------
        | CREATE TICKET
        |--------------------------------------------------------------------------
        */
        $ticket = Ticket::create($validated);

        /*
        |--------------------------------------------------------------------------
        | REDIRECT ONLINE
        |--------------------------------------------------------------------------
        */
        if ($ticket->jenis_tiket === 'online') {

            return redirect()
                ->route('payment.start', $ticket->id);
        }

        /*
        |--------------------------------------------------------------------------
        | REDIRECT OFFLINE
        |--------------------------------------------------------------------------
        */
        return redirect()
            ->route('tiket.success', $ticket->id)
            ->with('success', 'Tiket berhasil dibuat.');
    }

    /**
     * DETAIL TIKET
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {

            return redirect()
                ->route('tiket.index')
                ->with('error', 'Tiket tidak ditemukan.');
        }

        return view('pages.tiket', compact('ticket'));
    }

    /**
     * VALIDASI TIKET (SCAN QR)
     */
    public function validateTicket(Request $request)
    {
        $request->validate([
            'hash' => 'required|string'
        ]);

        $ticket = Ticket::where('hash', $request->hash)->first();

        /*
        |--------------------------------------------------------------------------
        | INVALID
        |--------------------------------------------------------------------------
        */
        if (!$ticket) {

            Validation::create([
                'ticket_id'  => null,
                'petugas_id' => Auth::id(),
                'scanned_at' => now(),
                'status'     => 'invalid'
            ]);

            return response()->json([
                'status' => 'invalid',
                'nama' => '-',
                'tiket' => '-',
                'tanggal' => '-'
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | BELUM DIBAYAR
        |--------------------------------------------------------------------------
        */
        if ($ticket->payment_status !== 'paid') {

            Validation::create([
                'ticket_id'  => $ticket->id,
                'petugas_id' => Auth::id(),
                'scanned_at' => now(),
                'status'     => 'invalid'
            ]);

            return response()->json([
                'status' => 'invalid',
                'nama' => $ticket->nama,
                'tiket' => ucfirst($ticket->jenis_tiket),
                'tanggal' => $ticket->tanggal_kunjungan,
                'message' => 'Pembayaran belum berhasil'
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | DUPLICATE
        |--------------------------------------------------------------------------
        */
        if ($ticket->status === 'used') {

            Validation::create([
                'ticket_id'  => $ticket->id,
                'petugas_id' => Auth::id(),
                'scanned_at' => now(),
                'status'     => 'duplicate'
            ]);

            return response()->json([
                'status' => 'duplicate',
                'nama' => $ticket->nama,
                'tiket' => ucfirst($ticket->jenis_tiket),
                'tanggal' => $ticket->tanggal_kunjungan
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | VALID
        |--------------------------------------------------------------------------
        */
        $ticket->update([
            'status' => 'used'
        ]);

        Validation::create([
            'ticket_id'  => $ticket->id,
            'petugas_id' => Auth::id(),
            'scanned_at' => now(),
            'status'     => 'valid'
        ]);

        return response()->json([
            'status' => 'valid',
            'nama' => $ticket->nama,
            'tiket' => ucfirst($ticket->jenis_tiket),
            'tanggal' => $ticket->tanggal_kunjungan
        ]);
    }
}