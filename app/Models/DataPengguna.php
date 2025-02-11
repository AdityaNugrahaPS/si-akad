<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengguna extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan oleh model ini (jika tidak menggunakan konvensi default)
    protected $table = 'data_penggunas';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'lembaga',
        'email',
        'nomor_telfon',
        'password',
    ];

    // Tentukan kolom yang tidak dapat diisi secara massal
    protected $guarded = [
        // Kolom yang tidak boleh diisi secara massal (jika ada)
    ];

    // Mengatur tipe data untuk kolom tertentu jika diperlukan (misal: casting untuk tipe tanggal)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Jika ada relasi dengan model lain, misalnya dengan model Role, maka bisa ditambahkan di sini
    // public function role()
    // {
    //     return $this->belongsTo(Role::class);
    // }
}
