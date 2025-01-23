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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('alamat');
            $table->string('npsn');
            $table->string('bentuk_sekolah')->nullable(true);
            $table->string('desa_kelurahan')->nullable(true);
            $table->string('kecamatan')->nullable(true);
            $table->string('kabupaten_kota')->nullable(true);
            $table->string('provinsi')->nullable(true);
            $table->string('telp')->nullable(true);
            $table->string('website')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('kode_pos')->nullable(true);
            $table->string('photo_profile')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
