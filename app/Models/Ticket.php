<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [

    // DATA DASAR
    'nama',
    'jenis_tiket',
    'tanggal_kunjungan',

    // DEMOGRAFI
    'kategori_pengunjung',
    'kategori_umur',
    'instansi',

    // WILAYAH
    'provinsi',
    'kabupaten',

    // KUNJUNGAN
    'tipe_kunjungan',
    'jumlah_pengunjung',
    'frekuensi',

    // TIKET ONLINE
    'kategori',
    'jumlah_tiket',

    // QR & STATUS
    'hash',
    'status',
    'payment_status',
];
    /**
     * Relasi ke Feedback
     */
    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }

    public function validations()
    {
        return $this->hasMany(Validation::class);
    }
}