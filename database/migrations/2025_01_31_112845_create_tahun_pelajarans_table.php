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
        Schema::create('tahun_pelajarans', function (Blueprint $table) {
            $table->id();
            $table->string('status'); // Status "Aktif" atau "Tidak Aktif"
            $table->string('tahun', 9); // Tahun akademik, misal: 2024
            $table->enum('semester', ['Ganjil', 'Genap']); // Semester "Ganjil" atau "Genap"
            $table->foreignId('guru_id')->constrained('gurus')->onDelete('cascade'); // Relasi ke tabel guru
            $table->date('tanggal_rapor'); // Tanggal rapor
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahun_pelajarans');
    }
};
