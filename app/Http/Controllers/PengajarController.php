<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use App\Models\Guru;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index() {
        $pengajars = Pengajar::get();
        return view("pages.pengajar.index", ["pengajars" => $pengajars]);
    }

    public function create(Request $request) {
        $gurus = Guru::get();
        return view("pages.pengajar.create", ["gurus" => $gurus]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "tahun_pelajaran" => "required|string|regex:/^\\d{4}\/\\d{4}$/",
            "semester" => "required|string|in:genap,ganjil",
            "nama_guru" => "required|string",
            "nama_mapel" => "required|string",
            "nama_kelas" => "required|string"
        ]);

        Pengajar::create($validated);
        return redirect()->route('pengajar.index')->with("success", "Berhasil menambahkan data pengajar!");
    }

    public function edit(Pengajar $pengajar) {
        $gurus = Guru::get();
        return view("pages.pengajar.edit", [
            "pengajar" => $pengajar,
            "gurus" => $gurus
        ]);
    }

    public function update(Request $request, Pengajar $pengajar) {
        $validate = $request->validate([
            "tahun_pelajaran" => "required|string|regex:/^\\d{4}\/\\d{4}$/",
            "semester" => "required|string|in:genap,ganjil",
            "nama_guru" => "required|string",
            "nama_mapel" => "required|string",
            "nama_kelas" => "required|string"
        ]);
        $pengajar->update($validate);

        return redirect()->route("pengajar.index")->with("success", "Data berhasil diupdate");
    }

    public function delete(Pengajar $pengajar) {
        $pengajar->delete();
        return redirect()->route('pengajar.index')->with('success', 'Data berhasil dihapus');
    }
}