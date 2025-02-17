<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupsTable extends Migration
{
    public function up()
    {
        Schema::create('grups', function (Blueprint $table) {
            $table->id();  // Kolom id otomatis bertipe bigint unsigned
            $table->string('nama_grup')->unique();
            $table->string('deskripsi_grup');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grups');
    }
}
