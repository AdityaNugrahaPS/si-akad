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
        Schema::create('data_penggunas', function (Blueprint $table) {
            $table->id();  // Kolom id utama
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('lembaga');
            $table->string('email')->unique();
            $table->string('nomor_telfon');
            $table->string('password');
            $table->foreignId('grup_id')->nullable()->constrained('grups')->onDelete('set null');  // Foreign key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penggunas');
    }
};
