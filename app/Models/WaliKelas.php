<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_id',  // Menambahkan kolom guru_id untuk relasi
        'kelas_id', // Menambahkan kolom kelas_id untuk relasi
        'tingkat',
    ];

    // Relasi dengan Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');  // Menunjukkan bahwa WaliKelas berhubungan dengan Guru
    }

    // Relasi dengan Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');  // Menunjukkan bahwa WaliKelas berhubungan dengan Kelas
    }

    public static $rules = [
        'guru_id' => 'required|exists:gurus,id',  // Validasi guru_id harus ada di tabel guru
        'kelas_id' => 'required|exists:kelas,id',  // Validasi kelas_id harus ada di tabel kelas
        'tingkat' => 'required|string|in:10,11,12',
    ];
}
