<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index() {
        // Mengambil semua data guru
        $guru = Guru::all();
        return view("pages.guru.index", ["gurus"=> $guru]);
    }

    public function create(Request $request) {
        // Menampilkan form untuk menambah guru
        return view("pages.guru.create");
    }

    public function store(Request $request) {
        // Validasi input dan simpan data guru
        $validated = $request->validate([
            "nama_lengkap" => "required|string|",
            "jenis_kelamin" => "required|string|in:laki-laki,perempuan",
            "nip" => "required|string",
            "nik" => "required|string|max:16",
            "tempat_lahir" => "nullable|string",
            "tanggal_lahir" => "nullable|string|date",
            "alamat" => "nullable|string",
            "gelar_depan" => "nullable|string",
            "gelar_belakang" => "nullable|string",
            "pendidikan_terakhir" => "nullable|string",
            "email" => "nullable|string|email",
            "telp" => "nullable|string"
        ]);

        // Menyimpan data guru yang sudah divalidasi
        Guru::create($validated);
        return redirect()->route('guru.index')->with("success","Berhasil menambahkan data guru!");
    }

    public function edit(Guru $guru){
        // Menampilkan form untuk edit data guru
        return view("pages.guru.edit", ["guru"=>$guru]);
    }

    public function update(Request $request, Guru $guru){
        // Validasi input untuk update
        $validate = $request->validate([
            "nama_lengkap" => "required|string|",
            "jenis_kelamin" => "required|string|in:laki-laki,perempuan",
            "nip" => "required|string",
            "nik" => "required|string|max:16",
            "tempat_lahir" => "nullable|string",
            "tanggal_lahir" => "nullable|string|date",
            "alamat" => "nullable|string",
            "gelar_depan" => "nullable|string",
            "gelar_belakang" => "nullable|string",
            "pendidikan_terakhir" => "nullable|string",
            "email" => "nullable|string|email",
            "telp" => "nullable|string"
        ]);

        // Update data guru
        $guru->update($validate);
        return redirect()->route("guru.index")->with("success","Data berhasil di update");
    }

    public function delete(Guru $guru){
        // Hapus data guru
        $guru->delete();
        return redirect()->route('guru.index')->with('success','Data berhasil dihapus');
    }
}
