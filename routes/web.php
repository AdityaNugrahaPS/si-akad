<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\TahunPelajaranController;
use App\Http\Controllers\JenjangPendidikanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataPenggunaController;
use App\Models\Profile;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Rombel;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Berikut adalah file route untuk aplikasi Anda. Pastikan bahwa nama route
| konsisten dengan pemanggilan route di view atau controller.
|
*/

// Home route
Route::get('/', function () {
    // Ambil atau buat profile jika belum ada
    $profile = Profile::firstOrCreate([
        'nama_sekolah' => 'Pondok Pesantren Khairul Ummah 2 Pekanbaru',
        'alamat'       => 'Jl. Gajah (Setelah BPMP Riau ) RT 01/ RW 13 Kelurahan Bambukuning',
        'npsn'         => '10101010101',
    ]);

    // Menghitung jumlah data masing-masing
    $siswaCount         = Siswa::count();
    $guruCount          = Guru::count();
    $kelasCount         = Kelas::count();
    $rombelCount        = Rombel::count();
    $mataPelajaranCount = MataPelajaran::count();

    // Mengirim data ke view (misalnya view berada di resources/views/pages/index.blade.php)
    return view('pages.index', [
        'profile'             => $profile,
        'siswaCount'          => $siswaCount,
        'guruCount'           => $guruCount,
        'kelasCount'          => $kelasCount,
        'rombelCount'         => $rombelCount,
        'mataPelajaranCount'  => $mataPelajaranCount,
    ]);
})->name('home')->middleware('auth');

// Authentication routes
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'submitLogin'])->name('auth.login.submit')->middleware('guest');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
});

// Profile routes
Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/edit', [ProfileController::class, 'update'])->name('profile.update');
});

// Jenjang Pendidikan routes
Route::prefix('jenjang-pendidikan')->middleware('auth')->group(function () {
    Route::get('', [JenjangPendidikanController::class, 'index'])->name('jenjang-pendidikan.index');
    Route::get('/add', [JenjangPendidikanController::class, 'create'])->name('jenjang-pendidikan.create');
    Route::post('/add', [JenjangPendidikanController::class, 'store'])->name('jenjang-pendidikan.store');
    Route::delete('/{jenjangPendidikan}', [JenjangPendidikanController::class, 'delete'])->name('jenjang-pendidikan.delete');
    Route::get('/edit/{jenjangPendidikan}', [JenjangPendidikanController::class, 'edit'])->name('jenjang-pendidikan.edit');
    Route::patch('/edit/{jenjangPendidikan}', [JenjangPendidikanController::class, 'update'])->name('jenjang-pendidikan.update');
});

// Guru routes
Route::prefix('guru')->middleware('auth')->group(function () {
    Route::get('', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/add', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/add', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/edit/{guru}', [GuruController::class, 'edit'])->name('guru.edit');
    Route::patch('/edit/{guru}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/{guru}', [GuruController::class, 'delete'])->name('guru.delete');
});

// Siswa routes
Route::prefix('siswa')->middleware('auth')->group(function () {
    Route::get('', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/create', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/edit/{siswa}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/edit/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/{siswa}', [SiswaController::class, 'delete'])->name('siswa.delete');
});

// Kelas routes
Route::prefix('kelas')->middleware('auth')->group(function () {
    Route::get('', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/add', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/add', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/edit/{kelas}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::patch('/edit/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/{kelas}', [KelasController::class, 'delete'])->name('kelas.delete');
});

// Wali Kelas routes
Route::prefix('wali-kelas')->middleware('auth')->group(function () {
    Route::get('', [WaliKelasController::class, 'index'])->name('wali-kelas.index');
    Route::get('/add', [WaliKelasController::class, 'create'])->name('wali-kelas.create');
    Route::post('/add', [WaliKelasController::class, 'store'])->name('wali-kelas.store');
    Route::get('/edit/{waliKelas}', [WaliKelasController::class, 'edit'])->name('wali-kelas.edit');
    Route::patch('/edit/{waliKelas}', [WaliKelasController::class, 'update'])->name('wali-kelas.update');
    Route::delete('/{waliKelas}', [WaliKelasController::class, 'delete'])->name('wali-kelas.delete');
});

// Mata Pelajaran routes
Route::prefix('mata-pelajaran')->middleware('auth')->group(function () {
    Route::get('', [MataPelajaranController::class, 'index'])->name('mata-pelajaran.index');
    Route::get('/add', [MataPelajaranController::class, 'create'])->name('mata-pelajaran.create');
    Route::post('/add', [MataPelajaranController::class, 'store'])->name('mata-pelajaran.store');
    Route::get('/edit/{mataPelajaran}', [MataPelajaranController::class, 'edit'])->name('mata-pelajaran.edit');
    Route::patch('/edit/{mataPelajaran}', [MataPelajaranController::class, 'update'])->name('mata-pelajaran.update');
    Route::delete('/{mataPelajaran}', [MataPelajaranController::class, 'delete'])->name('mata-pelajaran.delete');
});

// Pengajar routes
Route::prefix('pengajar')->middleware('auth')->group(function () {
    Route::get('', [PengajarController::class, 'index'])->name('pengajar.index');
    Route::get('/add', [PengajarController::class, 'create'])->name('pengajar.create');
    Route::post('/add', [PengajarController::class, 'store'])->name('pengajar.store');
    Route::get('/edit/{pengajar}', [PengajarController::class, 'edit'])->name('pengajar.edit');
    Route::patch('/edit/{pengajar}', [PengajarController::class, 'update'])->name('pengajar.update');
    Route::delete('/{pengajar}', [PengajarController::class, 'delete'])->name('pengajar.delete');
});

// Tahun Pelajaran routes
Route::prefix('tahun-pelajaran')->middleware('auth')->group(function () {
    Route::get('', [TahunPelajaranController::class, 'index'])->name('tahun-pelajaran.index');
    Route::get('/add', [TahunPelajaranController::class, 'create'])->name('tahun-pelajaran.create');
    Route::post('/add', [TahunPelajaranController::class, 'store'])->name('tahun-pelajaran.store');
    Route::get('/edit/{tahunPelajaran}', [TahunPelajaranController::class, 'edit'])->name('tahun-pelajaran.edit');
    Route::patch('/edit/{tahunPelajaran}', [TahunPelajaranController::class, 'update'])->name('tahun-pelajaran.update');
    Route::delete('/{tahunPelajaran}', [TahunPelajaranController::class, 'delete'])->name('tahun-pelajaran.delete');
    Route::post('/tahun-pelajaran/{id}/aktifkan', [TahunPelajaranController::class, 'aktifkan'])->name('tahun-pelajaran.aktifkan');
});

// Rombel routes
Route::prefix('rombel')->middleware('auth')->group(function () {
    Route::get('', [RombelController::class, 'index'])->name('rombel.index');
    Route::get('/add', [RombelController::class, 'create'])->name('rombel.create');
    Route::post('/add', [RombelController::class, 'store'])->name('rombel.store');
    Route::get('/edit/{rombel}', [RombelController::class, 'edit'])->name('rombel.edit');
    Route::patch('/edit/{rombel}', [RombelController::class, 'update'])->name('rombel.update');
    Route::delete('/{rombel}', [RombelController::class, 'delete'])->name('rombel.delete');
});

// Data Pengguna routes
Route::prefix('data-pengguna')->middleware('auth')->group(function () {
    Route::get('', [DataPenggunaController::class, 'index'])->name('data-pengguna.index');
    Route::get('/create', [DataPenggunaController::class, 'create'])->name('data-pengguna.create');
    Route::post('/create', [DataPenggunaController::class, 'store'])->name('data-pengguna.store');
    Route::get('/edit/{dataPengguna}', [DataPenggunaController::class, 'edit'])->name('data-pengguna.edit');
    Route::patch('/edit/{dataPengguna}', [DataPenggunaController::class, 'update'])->name('data-pengguna.update');
    Route::delete('/{dataPengguna}', [DataPenggunaController::class, 'delete'])->name('data-pengguna.delete');
});
