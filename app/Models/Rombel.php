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
        'nama_siswa',
    ];

    /**
     * Relasi ke model Kelas.
     * Setiap data rombel memiliki satu data kelas terkait.
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
