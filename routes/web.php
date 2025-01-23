<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
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
