<?php

namespace App\Http\Controllers;

use App\Models\WaliKelas;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index() {
        $waliKelas = WaliKelas::get();
        return view("pages.wali-kelas.index", ["waliKelas" => $waliKelas]);
    }

    public function create(Request $request) {
        return view("pages.wali-kelas.create");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "nama_guru" => "required|string|max:255", // Validasi untuk nama guru
            "tingkat" => "required|string|in:10,11,12",  // Validasi untuk tingkat kelas
            "nama_kelas" => "required|string|max:255",
        ]);

        WaliKelas::create($validated);
        return redirect()->route('wali-kelas.index')->with("success", "Berhasil menambahkan data wali kelas!");
    }

    public function edit(WaliKelas $waliKelas) {
        return view("pages.wali-kelas.edit", ["waliKelas" => $waliKelas]);
    }

    public function update(Request $request, WaliKelas $waliKelas) {
        $validated = $request->validate([
            "nama_guru" => "required|string|max:255",
            "tingkat" => "required|string|in:10,11,12",
            "nama_kelas" => "required|string|max:255",
        ]);

        $waliKelas->update($validated);
        return redirect()->route("wali-kelas.index")->with("success", "Data wali kelas berhasil diupdate");
    }

    public function delete(WaliKelas $waliKelas) {
        $waliKelas->delete();
        return redirect()->route('wali-kelas.index')->with('success', 'Data wali kelas berhasil dihapus');
    }
}
