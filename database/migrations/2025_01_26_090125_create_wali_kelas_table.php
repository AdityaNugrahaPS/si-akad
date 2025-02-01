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
        Schema::create('wali_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id')->constrained()->onDelete('cascade'); // Kolom guru_id untuk relasi dengan tabel guru
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade'); // Kolom kelas_id untuk relasi dengan tabel kelas
            $table->string('tingkat'); // Kolom untuk tingkat (misal 10, 11, 12)
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wali_kelas');
    }
};
