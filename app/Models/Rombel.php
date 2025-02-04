<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'tahun_pelajaran',
        'semester',
        'kelas_id',
        'siswa_id',  // Ganti nama_siswa dengan siswa_id
    ];

    /**
     * Relasi ke model Kelas.
     * Setiap data rombel memiliki satu data kelas terkait.
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    /**
     * Relasi ke model Siswa.
     * Setiap data rombel memiliki satu data siswa terkait.
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);  // Relasi dengan model Siswa
    }
}
