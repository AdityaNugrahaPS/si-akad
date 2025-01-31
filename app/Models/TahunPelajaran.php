<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun',
        'semester',
        'status',
        'guru_id',
        'tanggal_rapor'
    ];

    // Definisikan relasi antara TahunPelajaran dan Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id'); // Relasi belongsTo dengan model Guru
    }
}
