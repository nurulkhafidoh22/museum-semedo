<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [

        'nama_museum',
        'deskripsi_singkat',

        'alamat',
        'telepon',
        'email',

        'harga_online',
        'harga_offline',

        'hari_operasional',
        'jam_buka',
        'jam_tutup'
    ];
}