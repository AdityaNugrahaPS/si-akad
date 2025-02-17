<?php

namespace App\Http\Controllers;

use App\Models\Grup;  // Pastikan import Grup model ini
use Illuminate\Http\Request;

class GrupController extends Controller
{
    /**
     * Menampilkan daftar seluruh grup.
     */
    public function index()
    {
        $grups = Grup::all();
        return view("pages.data-pengguna.kelola-grup.index", ["grups" => $grups]);
    }

    /**
     * Menampilkan form untuk menambah grup.
     */
    public function create()
    {
        return view("pages.data-pengguna.kelola-grup.create");
    }

    /**
     * Menyimpan grup baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nama_grup"   => "required|string|max:255",
            "deskripsi_grup" => "required|string|max:255",
        ]);

        Grup::create($validated);

        return redirect()->route('data-pengguna.kelola-grup.index')
            ->with("success", "Grup berhasil ditambahkan!");
    }

    /**
     * Menghapus grup berdasarkan ID.
     */
    public function destroy($id)
    {
        $grup = Grup::findOrFail($id); // Mencari grup berdasarkan ID
        $grup->delete();  // Menghapus grup

        return redirect()->route('data-pengguna.kelola-grup.index')
            ->with("success", "Grup berhasil dihapus!");
    }
}
