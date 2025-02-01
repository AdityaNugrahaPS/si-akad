<?php

namespace App\Http\Controllers;

use App\Models\WaliKelas;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index()
    {
        $waliKelas = WaliKelas::with('guru', 'kelas')->get(); // Mengambil data wali kelas beserta guru dan kelas
        return view("pages.wali-kelas.index", ["waliKelas" => $waliKelas]);
    }

    public function create(Request $request)
    {
        // Ambil semua guru dan kelas untuk dropdown
        $gurus = Guru::all();
        $kelas = Kelas::all();
        return view("pages.wali-kelas.create", compact('gurus', 'kelas'));
    }



    public function edit(WaliKelas $waliKelas)
    {
        $gurus = Guru::all(); // Ambil data guru
        $kelas = Kelas::all(); // Ambil data kelas
        return view("pages.wali-kelas.edit", compact('waliKelas', 'gurus', 'kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "guru_id" => "required|exists:gurus,id", // Validasi untuk guru
            "kelas_id" => "required|exists:kelas,id", // Validasi untuk kelas
            "tingkat" => "required|string|in:10,11,12",  // Validasi untuk tingkat kelas
        ]);

        // Menyimpan data wali kelas dengan ID guru dan kelas
        WaliKelas::create($validated);
        return redirect()->route('wali-kelas.index')->with("success", "Berhasil menambahkan data wali kelas!");
    }

    public function update(Request $request, WaliKelas $waliKelas)
    {
        $validated = $request->validate([
            "guru_id" => "required|exists:gurus,id", // Validasi untuk guru
            "kelas_id" => "required|exists:kelas,id", // Validasi untuk kelas
            "tingkat" => "required|string|in:10,11,12",  // Validasi untuk tingkat kelas
        ]);

        // Update data wali kelas dengan ID guru dan kelas
        $waliKelas->update($validated);
        return redirect()->route("wali-kelas.index")->with("success", "Data wali kelas berhasil diupdate");
    }


    public function delete(WaliKelas $waliKelas)
    {
        $waliKelas->delete();
        return redirect()->route('wali-kelas.index')->with('success', 'Data wali kelas berhasil dihapus');
    }
}
