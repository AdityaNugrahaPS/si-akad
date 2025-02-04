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
        Schema::create('rombels', function (Blueprint $table) {
            $table->id();
            $table->char('tahun_pelajaran', 9)->comment('Format: yyyy/yyyy'); // Format tahun pelajaran
            $table->enum('semester', ['ganjil', 'genap']); // Semester: Ganjil atau Genap
            $table->foreignId('kelas_id')
                ->constrained('kelas') // Relasi dengan tabel kelas
                ->onDelete('cascade'); // Hapus data rombel jika kelas dihapus
            $table->foreignId('siswa_id') // Menambahkan relasi dengan tabel siswa
                ->constrained('siswas') // Relasi dengan tabel siswas
                ->onDelete('cascade'); // Hapus data rombel jika siswa dihapus
            $table->timestamps();

            // Menambahkan indeks unik agar tidak ada duplikasi dalam satu tahun pelajaran + semester + kelas
            $table->unique(['tahun_pelajaran', 'semester', 'kelas_id', 'siswa_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rombels');
    }
};
