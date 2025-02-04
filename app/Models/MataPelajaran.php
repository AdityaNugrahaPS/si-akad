<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mata_pelajaran',
        'kode_mata_pelajaran',
        'kelompok',
    ];

    // Relasi ke model Pengajar
    public function pengajar()
    {
        return $this->hasMany(Pengajar::class, 'mata_pelajaran_id');
    }
}
