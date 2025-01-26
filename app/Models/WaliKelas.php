<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'nama_guru',
        'tingkat',
        'nama_kelas',
    ];

    // Aturan validasi model
    public static $rules = [
        'nama_guru' => 'required|string|max:255',
        'tingkat' => 'required|string|in:10,11,12',
        'nama_kelas' => 'required|string|max:255',
    ];
}
