<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('koleksi', function (Blueprint $table) {

        $table->id();

        $table->string('judul');

        $table->string('slug')->unique();

        $table->string('kategori');

        $table->string('gambar');

        $table->string('periode')->nullable();

        $table->string('usia')->nullable();

        $table->string('lokasi')->nullable();

        $table->text('deskripsi');

        $table->longText('deskripsi_lengkap_1')->nullable();

        $table->longText('deskripsi_lengkap_2')->nullable();

        $table->longText('konteks')->nullable();

        $table->timestamps();
    });
}
};
