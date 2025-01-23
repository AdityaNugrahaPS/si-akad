<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_sekolah',
        'bentuk_sekolah',
        'npsn',
        'alamat',
        'desa_kelurahan',
        'kabupaten_kota',
        'provinsi',
        'kode_pos',
        'telp',
        'email',
        'website',
        'photo_profile'
    ];
}
