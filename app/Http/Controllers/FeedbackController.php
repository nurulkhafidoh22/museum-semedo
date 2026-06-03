<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Tampilkan form feedback berdasarkan QR (hash tiket)
     */
    public function create($hash)
    {
        // Cari tiket berdasarkan hash
        $ticket = Ticket::where('hash', $hash)->first();

        // Jika tiket tidak ditemukan
        if (!$ticket) {
            return view('pages.feedback-invalid');
        }

        // Jika sudah pernah mengisi feedback
        if ($ticket->feedback) {
            return view('pages.feedback-thanks');
        }

        // Jika belum, tampilkan form feedback
        return view('pages.feedback-form', compact('ticket'));
    }

    /**
     * Simpan feedback dari pengunjung
     */
    public function store(Request $request, $hash)
    {
        // Cari tiket
        $ticket = Ticket::where('hash', $hash)->first();

        if (!$ticket) {
            return view('pages.feedback-invalid');
        }

        // Cegah double submit
        if ($ticket->feedback) {
            return view('pages.feedback-thanks');
        }

        // Validasi input
        $validated = $request->validate([
            'rating'   => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:1000',
        ]);

        // Simpan feedback
        Feedback::create([
            'ticket_id' => $ticket->id,
            'rating'    => $validated['rating'],
            'komentar'  => $validated['komentar'] ?? null,
        ]);

        // Setelah berhasil
        return view('pages.feedback-thanks');
    }
}