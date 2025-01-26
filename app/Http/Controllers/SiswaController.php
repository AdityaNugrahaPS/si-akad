<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::get();
        return view("pages.siswa.index", ["siswas"=> $siswa]);
    }

    public function create(Request $request) {
        return view("pages.siswa.create");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "nama_lengkap" => "required|string",
            "jenis_kelamin" => "required|string|in:laki-laki,perempuan",
            "nis" => "required|string",
            "nisn" => "required|string",
            "nik" => "required|string|max:16",
            "tempat_lahir" => "nullable|string",
            "tanggal_lahir" => "nullable|string|date",
            "alamat" => "nullable|string",
            "kelurahan" => "nullable|string",
            "kecamatan" => "nullable|string",
            "kota" => "nullable|string",
            "provinsi" => "nullable|string",
            "kode_pos" => "nullable|string|max:5",
            "nama_ayah" => "nullable|string",
            "pekerjaan_ayah" => "nullable|string",
            "nama_ibu" => "nullable|string",
            "pekerjaan_ibu" => "nullable|string",
            "telp_siswa" => "nullable|string",
            "telp_ayah" => "nullable|string",
            "telp_ibu" => "nullable|string"
        ]);

        Siswa::create($validated);
        return redirect()->route('siswa.index')->with("success","Berhasil menambahkan data siswa!");
    }

    public function edit(Siswa $siswa){
        return view("pages.siswa.edit", ["siswa"=>$siswa]);
    }

    public function update(Request $request, Siswa $siswa){
        $validate = $request->validate([
            "nama_lengkap" => "required|string",
            "jenis_kelamin" => "required|string|in:laki-laki,perempuan",
            "nis" => "required|string",
            "nisn" => "required|string",
            "nik" => "required|string|max:16",
            "tempat_lahir" => "nullable|string",
            "tanggal_lahir" => "nullable|string|date",
            "alamat" => "nullable|string",
            "kelurahan" => "nullable|string",
            "kecamatan" => "nullable|string",
            "kota" => "nullable|string",
            "provinsi" => "nullable|string",
            "kode_pos" => "nullable|string|max:5",
            "nama_ayah" => "nullable|string",
            "pekerjaan_ayah" => "nullable|string",
            "nama_ibu" => "nullable|string",
            "pekerjaan_ibu" => "nullable|string",
            "telp_siswa" => "nullable|string",
            "telp_ayah" => "nullable|string",
            "telp_ibu" => "nullable|string"
        ]);
        $siswa->update($validate);

        return redirect()->route("siswa.index")->with("success","Data berhasil di update");
    }

    public function delete(Siswa $siswa){
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success','Data berhasil dihapus');
    }
}
