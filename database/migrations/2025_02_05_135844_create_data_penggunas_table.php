<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPenggunasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('data_penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('lembaga');
            $table->string('email')->unique();
            $table->string('nomor_telfon');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('data_penggunas');
    }
}
