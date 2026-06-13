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
        Schema::create('website_settings', function (Blueprint $table) {

            $table->id();

            // Informasi Museum
            $table->string('nama_museum')->nullable();
            $table->text('deskripsi_singkat')->nullable();

            // Kontak
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();

            // Tiket
            $table->integer('harga_online')->default(0);
            $table->integer('harga_offline')->default(0);

            // Operasional
            $table->string('hari_operasional')->nullable();
            $table->time('jam_buka')->nullable();
            $table->time('jam_tutup')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
