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
        Schema::create('pengajars', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_pelajaran'); // Format: yyyy/yyyy
            $table->enum('semester', ['genap', 'ganjil']);
            $table->foreignId('guru_id')->constrained('gurus')->onDelete('cascade');
            // Menggunakan foreign key ke tabel mata_pelajarans
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajarans')->onDelete('cascade');
            // Foreign key ke tabel kelas
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajars', function (Blueprint $table) {
            $table->dropForeign(['guru_id']);
            $table->dropForeign(['mata_pelajaran_id']);
            $table->dropForeign(['kelas_id']);
        });
        Schema::dropIfExists('pengajars');
    }
};
