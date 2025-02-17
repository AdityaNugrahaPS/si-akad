<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengguna extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan oleh model ini
    protected $table = 'data_penggunas';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'lembaga',
        'email',
        'nomor_telfon',
        'password',
        'grup_id',  // Ubah nama kolom menjadi grup_id
    ];
    
    // Mengatur tipe data untuk kolom tertentu jika diperlukan
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function grup()
    {
        return $this->belongsTo(Grup::class); // Relasi BelongsTo ke Grup
    }
    
}
