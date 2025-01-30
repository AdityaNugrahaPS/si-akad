<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    protected $fillable = [
        "tahun_pelajaran",
        "semester",
        "nama_guru",
        "nama_mapel",
        "nama_kelas"
    ];
}
