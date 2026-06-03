<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * RUN MIGRATION
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {

            $table->id();

            // ==================================================
            // DATA PENGUNJUNG
            // ==================================================

            // nama pengunjung
            $table->string('nama');

            // online / offline
            $table->string('jenis_tiket');

            // tanggal kunjungan museum
            $table->date('tanggal_kunjungan');

            // ==================================================
            // DEMOGRAFI PENGUNJUNG
            // ==================================================

            // umum / sd / smp / sma / pt
            $table->string('kategori_pengunjung')->nullable();

            // 0-12 / 13-17 / dst
            $table->string('kategori_umur')->nullable();

            // nama sekolah / instansi
            $table->string('instansi')->nullable();

            // ==================================================
            // ASAL DAERAH
            // ==================================================

            $table->string('provinsi')->nullable();

            $table->string('kabupaten')->nullable();

            // ==================================================
            // INFORMASI KUNJUNGAN
            // ==================================================

            // individu / rombongan
            $table->string('tipe_kunjungan')->nullable();

            // jumlah pengunjung sebenarnya
            $table->integer('jumlah_pengunjung')->default(1);

            // frekuensi kunjungan
            // 1 = pertama kali
            // 2 = kedua kali
            // 3 = ketiga kali
            // 4 = lebih dari 3 kali
            $table->string('frekuensi')->nullable();

            // ==================================================
            // DATA TIKET ONLINE
            // ==================================================

            // domestik / mancanegara
            $table->string('kategori')->nullable();

            // jumlah tiket online
            $table->integer('jumlah_tiket')->default(1);

            // ==================================================
            // QR CODE
            // ==================================================

            // hash unik QR
            $table->string('hash')->unique();

            // ==================================================
            // STATUS PEMBAYARAN
            // ==================================================

            $table->enum('payment_status', [

                'pending',     // belum bayar
                'paid',        // pembayaran berhasil
                'failed'       // pembayaran gagal

            ])->default('pending');

            // ==================================================
            // STATUS TIKET
            // ==================================================

            $table->enum('status', [

                'unused',
                'used'

            ])->default('unused');

            // ==================================================
            // TIMESTAMP
            // ==================================================

            $table->timestamps();
        });
    }

    /**
     * ROLLBACK MIGRATION
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};