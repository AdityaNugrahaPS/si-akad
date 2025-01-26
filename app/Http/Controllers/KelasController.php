<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index() {
        $kelas = Kelas::get();
        return view("pages.kelas.index", ["kelas" => $kelas]);
    }

    public function create(Request $request) {
        return view("pages.kelas.create");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "tingkat" => "required|string|in:10,11,12",  // Validasi untuk tingkat kelas
            "nama_kelas" => "required|string|max:255",
            "kode_kelas" => "required|string|max:10|unique:kelas,kode_kelas",  // Pastikan kode kelas unik
        ]);

        Kelas::create($validated);
        return redirect()->route('kelas.index')->with("success", "Berhasil menambahkan data kelas!");
    }

    public function edit(Kelas $kelas) {
        return view("pages.kelas.edit", ["kelas" => $kelas]);
    }

    public function update(Request $request, Kelas $kelas) {
        $validated = $request->validate([
            "tingkat" => "required|string|in:10,11,12",
            "nama_kelas" => "required|string|max:255",
            "kode_kelas" => "required|string|max:10|unique:kelas,kode_kelas," . $kelas->id,  // Perbarui validasi untuk pengecekan kode kelas
        ]);

        $kelas->update($validated);
        return redirect()->route("kelas.index")->with("success", "Data kelas berhasil diupdate");
    }

    public function delete(Kelas $kelas) {
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus');
    }
}
