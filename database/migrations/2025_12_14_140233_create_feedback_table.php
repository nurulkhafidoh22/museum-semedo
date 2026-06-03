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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();

            // Relasi ke tiket
            $table->foreignId('ticket_id')
                  ->constrained('tickets')
                  ->onDelete('cascade');

            // Rating 1 - 5
            $table->unsignedTinyInteger('rating');

            // Komentar opsional
            $table->text('komentar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};