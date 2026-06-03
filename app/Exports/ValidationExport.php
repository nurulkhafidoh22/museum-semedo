<?php

namespace App\Exports;

use App\Models\Validation;
use Maatwebsite\Excel\Concerns\FromCollection;

class ValidationExport implements FromCollection
{
    public function collection()
    {
        return Validation::with(['ticket', 'petugas'])->get()->map(function ($v) {
            return [
                'Nama' => $v->ticket->nama ?? '-',
                'Tiket' => $v->ticket->jenis_tiket ?? '-',
                'Waktu' => $v->scanned_at,
                'Status' => $v->status,
                'Petugas' => $v->petugas->name ?? '-',
            ];
        });
    }
}