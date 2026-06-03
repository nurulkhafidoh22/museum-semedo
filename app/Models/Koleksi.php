<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    protected $table = 'koleksi';

    protected $fillable = [

        'judul',
        'slug',
        'kategori',
        'gambar',
        'periode',
        'usia',
        'lokasi',
        'deskripsi',
        'deskripsi_lengkap_1',
        'deskripsi_lengkap_2',
        'konteks'
    ];
}