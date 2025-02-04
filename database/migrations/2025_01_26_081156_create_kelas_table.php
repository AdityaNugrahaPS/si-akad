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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->enum('tingkat', ['10', '11', '12'])->comment('Tingkat kelas: 10, 11, atau 12');
            $table->string('nama_kelas')->unique()->comment('Nama kelas harus unik'); // Nama kelas unik
            $table->char('kode_kelas', 10)->unique()->comment('Kode unik untuk kelas, max 10 karakter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
