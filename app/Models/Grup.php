<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    use HasFactory;

    protected $fillable = ['nama_grup', 'deskripsi_grup'];


    public function dataPenggunas()
    {
        return $this->hasMany(DataPengguna::class);
    }
}
