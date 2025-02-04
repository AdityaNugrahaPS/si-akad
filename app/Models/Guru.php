<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    // Kolom yang dapat diisi massal
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

    // Relasi dengan WaliKelas
    public function waliKelas()
    {
        return $this->hasMany(WaliKelas::class);  // Guru bisa memiliki banyak WaliKelas
    }

    // Relasi dengan Pengajar
    public function pengajars()
    {
        return $this->hasMany(Pengajar::class, 'guru_id'); // Seorang Guru dapat mengajar banyak Pengajar
    }
}
