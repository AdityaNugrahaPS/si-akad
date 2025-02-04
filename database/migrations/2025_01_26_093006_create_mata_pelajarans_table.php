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
        Schema::create('mata_pelajarans', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('nama_mata_pelajaran'); // Nama Mata Pelajaran
            $table->string('kode_mata_pelajaran')->unique(); // Kode Mata Pelajaran (dijadikan unik, jika diperlukan)
            $table->enum('kelompok', ['A', 'B', 'C']); // Kelompok (A, B, C)
            $table->timestamps(); // Kolom timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_pelajarans');
    }
};
