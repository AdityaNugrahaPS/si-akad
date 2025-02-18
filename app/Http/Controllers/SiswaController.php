<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::get();
        return view("pages.siswa.index", ["siswas" => $siswa]);
    }

    public function create(Request $request) {
        return view("pages.siswa.create");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "nama_lengkap"     => "required|string",
            "nama_panggilan"   => "required|string",
            "jenis_kelamin"    => "required|string|in:laki-laki,perempuan",
            "agama"            => "required|string",
            "aktif"            => "required|boolean",
            "nis"              => "required|string",
            "nik"              => "required|string|max:16",
            "nikk"             => "nullable|string|max:16",
            "tanggal_lahir"    => "required|date_format:Y-m-d",
            "tempat_lahir"     => "required|string",
            "alamat"           => "nullable|string",
            "kelurahan"        => "nullable|string",
            "kecamatan"        => "nullable|string",
            "kota"             => "nullable|string",
            "provinsi"         => "nullable|string",
            "kode_pos"         => "nullable|string|max:5",
            "nama_ayah"        => "nullable|string",
            "pekerjaan_ayah"   => "nullable|string",
            "penghasilan_ayah" => "nullable|numeric",
            "nama_ibu"         => "nullable|string",
            "pekerjaan_ibu"    => "nullable|string",
            "penghasilan_ibu"  => "nullable|numeric",
            "nama_wali"        => "nullable|string",
            "pekerjaan_wali"   => "nullable|string",
            "penghasilan_wali" => "nullable|numeric",
            "foto"             => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "tahun_masuk" => "required|date_format:Y|digits:4",
            "telp_siswa"       => "nullable|string",
            "telp_ayah"        => "nullable|string",
            "telp_ibu"         => "nullable|string",
            "telp_wali"        => "nullable|string"
        ]);

        // Handle Foto Upload
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('siswa_photos', 'public');
        }

        // Menyimpan data siswa ke database
        Siswa::create($validated);
        return redirect()->route('siswa.index')->with("success", "Berhasil menambahkan data siswa!");
    }

    public function edit(Siswa $siswa) {
        return view("pages.siswa.edit", ["siswa" => $siswa]);
    }

    public function update(Request $request, Siswa $siswa) {
        $validated = $request->validate([
            "nama_lengkap"     => "required|string",
            "nama_panggilan"   => "required|string",
            "jenis_kelamin"    => "required|string|in:laki-laki,perempuan",
            "agama"            => "required|string",
            "aktif"            => "required|boolean",
            "nis"              => "required|string",
            "nik"              => "required|string|max:16",
            "nikk"             => "nullable|string|max:16",
            "tanggal_lahir"    => "required|date_format:Y-m-d",
            "tempat_lahir"     => "required|string",
            "alamat"           => "nullable|string",
            "kelurahan"        => "nullable|string",
            "kecamatan"        => "nullable|string",
            "kota"             => "nullable|string",
            "provinsi"         => "nullable|string",
            "kode_pos"         => "nullable|string|max:5",
            "nama_ayah"        => "nullable|string",
            "pekerjaan_ayah"   => "nullable|string",
            "penghasilan_ayah" => "nullable|numeric",
            "nama_ibu"         => "nullable|string",
            "pekerjaan_ibu"    => "nullable|string",
            "penghasilan_ibu"  => "nullable|numeric",
            "nama_wali"        => "nullable|string",
            "pekerjaan_wali"   => "nullable|string",
            "penghasilan_wali" => "nullable|numeric",
            "foto"             => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "tahun_masuk" => "required|date_format:Y|digits:4",
            "telp_siswa"       => "nullable|string",
            "telp_ayah"        => "nullable|string",
            "telp_ibu"         => "nullable|string",
            "telp_wali"        => "nullable|string"
        ]);

        // Handle Foto Upload jika ada perubahan foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($siswa->foto) {
                \Storage::delete('public/' . $siswa->foto);
            }
            $validated['foto'] = $request->file('foto')->store('siswa_photos', 'public');
        }

        // Memperbarui data siswa
        $siswa->update($validated);
        return redirect()->route("siswa.index")->with("success", "Data berhasil di update");
    }

    public function delete(Siswa $siswa) {
        // Menghapus foto jika ada
        if ($siswa->foto) {
            \Storage::delete('public/' . $siswa->foto);
        }
        
        // Menghapus data siswa dari database
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus');
    }
}
