<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'ticket_id',
        'rating',
        'komentar',
    ];

    /**
     * Relasi: Feedback milik satu Tiket
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}