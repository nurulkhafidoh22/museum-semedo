<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsitePage extends Model
{
    protected $table = 'website_pages';
    protected $fillable = [
        'page',
        'section',
        'title',
        'content',
        'image',
    ];
}