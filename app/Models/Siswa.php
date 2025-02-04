<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // Menambahkan properti $fillable sesuai dengan kolom yang bisa diisi
    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'jenis_kelamin',
        'agama',
        'aktif',
        'nis',
        'nik',
        'nikk',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos',
        'nama_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'nama_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
        'foto',
        'tahun_masuk',
        'telp_siswa',
        'telp_ayah',
        'telp_ibu',
        'telp_wali',
    ];

    // Menambahkan accessor untuk mendapatkan URL foto jika ada
    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : null;
    }

    /**
     * Relasi ke model Rombel.
     * Setiap siswa bisa memiliki banyak data rombel.
     */
    public function rombels()
    {
        return $this->hasMany(Rombel::class); // Siswa bisa memiliki banyak rombel
    }
}
