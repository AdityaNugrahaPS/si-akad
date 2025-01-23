<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\JenjangPendidikan;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Akhlaqul Muhammad Fadwa',
            'username' => 'aqul',
            'email' => 'am.fadwa15@gmail.com',
            'password'=> bcrypt('15082005'),
        ]);

        Profile::create([
            'nama_sekolah' => 'Pondok Pesantren Khairul Ummah 2 Pekanbaru',
            'alamat' => 'Jl. Gajah (Setelah BPMP Riau ) RT 01/ RW 13 Kelurahan Bambukuning',
            'npsn' => '10101010101',
        ]);

        JenjangPendidikan::create([
            'jenjang_pendidikan' => 'Ummah'
        ]);

        Guru::create([
            'nama_lengkap' => 'Aqul',
            'jenis_kelamin' => 'laki-laki',
            'nip' => '19719199191919',
            'nik' => '19719199191919',
        ]);
    }
}
