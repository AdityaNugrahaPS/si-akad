<?php

namespace App\Http\Controllers;

use App\Models\DataPengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Grup;

class DataPenggunaController extends Controller
{
    /**
     * Menampilkan daftar seluruh data pengguna.
     */
    public function index()
    {
        // Mengambil semua data pengguna dengan eager loading untuk relasi grup
        $penggunas = DataPengguna::with('grup')->get();
        return view("pages.data-pengguna.index", ["penggunas" => $penggunas]);
    }

    /**
     * Menampilkan form untuk menambah data pengguna.
     */
    public function create()
    {
        $grups = Grup::all(); // Mengambil seluruh data grup
        return view('pages.data-pengguna.create', compact('grups'));
    }

    /**
     * Menyimpan data pengguna baru ke dalam basis data.
     */
    public function store(Request $request)
    {
        // Validasi input data pengguna
        $validated = $request->validate([
            "nama_depan"          => "required|string|max:255",
            "nama_belakang"       => "required|string|max:255",
            "lembaga"             => "required|string|max:255",
            "email"               => "required|string|email|max:255|unique:data_penggunas,email",
            "nomor_telfon"        => "required|string|max:20",
            "password"            => "required|string|min:6",
            "konfirmasi_password" => "required|string|min:6|same:password",
            "grup_id"             => "required|exists:grups,id", // Pastikan grup_id valid
        ]);

        // Hash password sebelum disimpan dan hapus field konfirmasi_password
        $validated['password'] = Hash::make($validated['password']);
        unset($validated['konfirmasi_password']);

        // Simpan data pengguna yang sudah tervalidasi
        DataPengguna::create($validated);

        return redirect()->route('data-pengguna.index')
            ->with("success", "Berhasil menambahkan data pengguna!");
    }

    /**
     * Menampilkan form untuk mengedit data pengguna.
     */
    public function edit($id)
    {
        $dataPengguna = DataPengguna::findOrFail($id);
        $grups = Grup::all(); // Mengambil seluruh data grup
        return view('pages.data-pengguna.edit', compact('dataPengguna', 'grups'));
    }
    
    /**
     * Mengupdate data pengguna yang sudah ada.
     */
    public function update(Request $request, DataPengguna $dataPengguna)
    {
        // Validasi input untuk update data pengguna
        $validated = $request->validate([
            "nama_depan"          => "required|string|max:255",
            "nama_belakang"       => "required|string|max:255",
            "lembaga"             => "required|string|max:255",
            "email"               => "required|string|email|max:255|unique:data_penggunas,email," . $dataPengguna->id,
            "nomor_telfon"        => "required|string|max:20",
            "grup_id"             => "required|exists:grups,id", // Pastikan grup_id valid
            "password"            => "nullable|string|min:6",
            "konfirmasi_password" => "nullable|string|min:6|same:password",
        ]);

        // Jika password diisi, maka hash password tersebut
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }
        unset($validated['konfirmasi_password']);

        // Update data pengguna
        $dataPengguna->update($validated);

        return redirect()->route('data-pengguna.index')
            ->with("success", "Data pengguna berhasil diupdate");
    }

    /**
     * Menghapus data pengguna.
     */
    public function delete(DataPengguna $dataPengguna)
    {
        $dataPengguna->delete();
        return redirect()->route('data-pengguna.index')
            ->with('success', 'Data pengguna berhasil dihapus');
    }
}
