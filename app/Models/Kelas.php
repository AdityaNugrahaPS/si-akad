<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rombel; // Pastikan untuk meng-import model Rombel

class Kelas extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'tingkat',
        'nama_kelas',
        'kode_kelas',
    ];

    // Relasi dengan WaliKelas
    public function waliKelas()
    {
        return $this->hasMany(WaliKelas::class);  // Kelas bisa memiliki banyak WaliKelas
    }

    // Relasi dengan Pengajar
    public function pengajars()
    {
        return $this->hasMany(Pengajar::class, 'kelas_id'); // Kelas bisa memiliki banyak Pengajar via kelas_id
    }

    // Relasi dengan Rombel
    public function rombels()
    {
        return $this->hasMany(Rombel::class); // Kelas bisa memiliki banyak Rombel
    }

    // Aturan validasi model
    public static $rules = [
        'tingkat' => 'required|string|in:10,11,12',
        'nama_kelas' => 'required|string|max:255',
        'kode_kelas' => 'required|string|max:10|unique:kelas,kode_kelas',
    ];
}
