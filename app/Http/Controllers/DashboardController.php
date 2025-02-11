<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Pastikan model-model berikut sudah ada dan di-import dengan benar
use App\Models\Profile;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Rombel;
use App\Models\MataPelajaran;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data profil sekolah (sesuaikan dengan logika aplikasi Anda)
        $profile = Profile::first(); 

        // Dapatkan jumlah data dari masing-masing tabel/model
        $siswaCount          = Siswa::count();
        $guruCount           = Guru::count();
        $kelasCount          = Kelas::count();
        $rombelCount         = Rombel::count();
        $mataPelajaranCount  = MataPelajaran::count();

        // Kirim data ke view dashboard
        return view('dashboard', compact(
            'profile', 
            'siswaCount', 
            'guruCount', 
            'kelasCount', 
            'rombelCount', 
            'mataPelajaranCount'
        ));
    }
}
