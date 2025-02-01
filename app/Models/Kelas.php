<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // Aturan validasi model
    public static $rules = [
        'tingkat' => 'required|string|in:10,11,12',
        'nama_kelas' => 'required|string|max:255',
        'kode_kelas' => 'required|string|max:10|unique:kelas,kode_kelas',
    ];
}
