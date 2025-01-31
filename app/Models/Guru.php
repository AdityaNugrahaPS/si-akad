<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{

    protected $fillable = [
        "nama_lengkap",
        "jenis_kelamin",
        "nip",
        "nik",
        "tempat_lahir",
        "tanggal_lahir",
        "alamat",
        "gelar_depan",
        "gelar_belakang",
        "pendidikan_terakhir",
        "email",
        "telp"
    ];
}
