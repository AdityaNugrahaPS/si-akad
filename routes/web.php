<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\JenjangPendidikanController;
use App\Http\Controllers\ProfileController;
use App\Models\Profile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    $profile = Profile::firstOrCreate([
        'nama_sekolah' => 'Pondok Pesantren Khairul Ummah 2 Pekanbaru',
        'alamat' => 'Jl. Gajah (Setelah BPMP Riau ) RT 01/ RW 13 Kelurahan Bambukuning',
        'npsn' => '10101010101',
    ]);

    return view('/pages/index', [
        'profile' => $profile
    ]);
})->name('home')->middleware('auth');

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class,'login'])->name('auth.login')->middleware('guest');
    Route::post('/login', [AuthController::class,'submitLogin'])->name('auth.login.submit')->middleware('guest');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
});

Route::prefix('profile')->group(function () {
    Route::get('', [ProfileController::class,'index'])->name('profile.index');
    Route::get('/edit', [ProfileController::class,'edit'])->name('profile.edit');
    Route::put('/edit', [ProfileController::class,'update'])->name('profile.update');
})->middleware('auth');

Route::prefix('jenjang-pendidikan')->group(function () {
    Route::get('', [JenjangPendidikanController::class,'index'])->name('jenjang-pendidikan.index');
    Route::get('/add', [JenjangPendidikanController::class,'create'])->name('jenjang-pendidikan.create');
    Route::post('/add', [JenjangPendidikanController::class,'store'])->name('jenjang-pendidikan.store');
    Route::delete('/{jenjangPendidikan}', [JenjangPendidikanController::class,'delete'])->name('jenjang-pendidikan.delete');
    Route::get('/edit/{jenjangPendidikan}', [JenjangPendidikanController::class,'edit'])->name('jenjang-pendidikan.edit');
    Route::patch('/edit/{jenjangPendidikan}', [JenjangPendidikanController::class,'update'])->name('jenjang-pendidikan.update');
})->middleware('auth');

Route::prefix('guru')->group(function () {
    Route::get('', [GuruController::class,'index'])->name('guru.index');
    Route::get('/add', [GuruController::class,'create'])->name('guru.create');
    Route::post('/add', [GuruController::class,'store'])->name('guru.store');
    Route::get('/edit/{guru}', [GuruController::class,'edit'])->name('guru.edit');
    Route::patch('/edit/{guru}', [GuruController::class,'update'])->name('guru.update');
    Route::delete('/{guru}', [GuruController::class,'delete'])->name('guru.delete');
})->middleware('auth');

Route::prefix('siswa')->group(function () {
    Route::get('', [SiswaController::class, 'index'])->name('siswa.index'); // Halaman utama daftar siswa
    Route::get('/create', [SiswaController::class, 'create'])->name('siswa.create'); // Form untuk menambah siswa baru
    Route::post('/create', [SiswaController::class, 'store'])->name('siswa.store'); // Proses menyimpan siswa baru
    Route::get('/edit/{siswa}', [SiswaController::class, 'edit'])->name('siswa.edit'); // Form untuk mengedit data siswa
    Route::put('/edit/{siswa}', [SiswaController::class, 'update'])->name('siswa.update'); // Proses update data siswa
    Route::delete('/{siswa}', [SiswaController::class, 'delete'])->name('siswa.delete'); // Hapus data siswa
})->middleware('auth');

Route::prefix('kelas')->group(function () {
    Route::get('', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/add', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/add', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/edit/{kelas}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::patch('/edit/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/{kelas}', [KelasController::class, 'delete'])->name('kelas.delete');
})->middleware('auth');

Route::prefix('wali-kelas')->group(function () {
    Route::get('', [WaliKelasController::class, 'index'])->name('wali-kelas.index');
    Route::get('/add', [WaliKelasController::class, 'create'])->name('wali-kelas.create');  // Metode GET untuk form tambah wali kelas
    Route::post('/add', [WaliKelasController::class, 'store'])->name('wali-kelas.store');  // Metode POST untuk menyimpan data
    Route::get('/edit/{waliKelas}', [WaliKelasController::class, 'edit'])->name('wali-kelas.edit');
    Route::patch('/edit/{waliKelas}', [WaliKelasController::class, 'update'])->name('wali-kelas.update');
    Route::delete('/{waliKelas}', [WaliKelasController::class, 'delete'])->name('wali-kelas.delete');
})->middleware('auth');


Route::prefix('mata-pelajaran')->group(function () {
    Route::get('', [MataPelajaranController::class, 'index'])->name('mata-pelajaran.index');
    Route::get('/add', [MataPelajaranController::class, 'create'])->name('mata-pelajaran.create');
    Route::post('/add', [MataPelajaranController::class, 'store'])->name('mata-pelajaran.store');
    Route::get('/edit/{mataPelajaran}', [MataPelajaranController::class, 'edit'])->name('mata-pelajaran.edit');
    Route::patch('/edit/{mataPelajaran}', [MataPelajaranController::class, 'update'])->name('mata-pelajaran.update');
    Route::delete('/{mataPelajaran}', [MataPelajaranController::class, 'delete'])->name('mata-pelajaran.delete');
})->middleware('auth');

Route::prefix('pengajar')->group(function () {
    Route::get('', [PengajarController::class, 'index'])->name('pengajar.index');
    Route::get('/add', [PengajarController::class, 'create'])->name('pengajar.create');
    Route::post('/add', [PengajarController::class, 'store'])->name('pengajar.store');
    Route::get('/edit/{pengajar}', [PengajarController::class, 'edit'])->name('pengajar.edit');
    Route::patch('/edit/{pengajar}', [PengajarController::class, 'update'])->name('pengajar.update');
    Route::delete('/{pengajar}', [PengajarController::class, 'delete'])->name('pengajar.delete');
})->middleware('auth');
