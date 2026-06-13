<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('website_pages', function (Blueprint $table) {

            $table->id();

            // halaman
            $table->string('page');

            // section di halaman
            $table->string('section');

            // judul section
            $table->string('title');

            // isi section
            $table->longText('content')->nullable();

            // gambar section
            $table->string('image')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_pages');
    }
};