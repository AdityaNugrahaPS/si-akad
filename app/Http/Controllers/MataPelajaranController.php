<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index() {
        $mataPelajaran = MataPelajaran::get();
        return view("pages.mata-pelajaran.index", ["mataPelajaran" => $mataPelajaran]);
    }

    public function create(Request $request) {
        return view("pages.mata-pelajaran.create");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "nama_mata_pelajaran" => "required|string|max:255", // Validasi untuk nama mata pelajaran
            "kode_mata_pelajaran" => "required|string|max:255", // Validasi untuk kode mata pelajaran
            "kelompok" => "required|string|in:A,B,C",  // Validasi untuk kelompok A, B, atau C
        ]);

        MataPelajaran::create($validated);
        return redirect()->route('mata-pelajaran.index')->with("success", "Berhasil menambahkan mata pelajaran!");
    }

    public function edit(MataPelajaran $mataPelajaran) {
        return view("pages.mata-pelajaran.edit", ["mataPelajaran" => $mataPelajaran]);
    }

    public function update(Request $request, MataPelajaran $mataPelajaran) {
        $validated = $request->validate([
            "nama_mata_pelajaran" => "required|string|max:255",
            "kode_mata_pelajaran" => "required|string|max:255",
            "kelompok" => "required|string|in:A,B,C",
        ]);

        $mataPelajaran->update($validated);
        return redirect()->route("mata-pelajaran.index")->with("success", "Data mata pelajaran berhasil diupdate");
    }

    public function delete(MataPelajaran $mataPelajaran) {
        $mataPelajaran->delete();
        return redirect()->route('mata-pelajaran.index')->with('success', 'Data mata pelajaran berhasil dihapus');
    }
}
