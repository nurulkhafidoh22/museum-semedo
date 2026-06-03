<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    protected $fillable = [
        'ticket_id',
        'petugas_id',
        'scanned_at',
        'status'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}