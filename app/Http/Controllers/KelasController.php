<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index() {
        // Mengambil semua data kelas
        $kelas = Kelas::all(); // Mendapatkan semua kelas yang ada
        return view("pages.kelas.index", ["kelas" => $kelas]);
    }

    public function create(Request $request) {
        // Menampilkan form untuk menambah kelas
        return view("pages.kelas.create");
    }

    public function store(Request $request) {
        // Validasi input dan simpan data kelas
        $validated = $request->validate([
            "tingkat" => "required|string|in:10,11,12",  // Validasi untuk tingkat kelas
            "nama_kelas" => "required|string|max:255",
            "kode_kelas" => "required|string|max:10|unique:kelas,kode_kelas",  // Pastikan kode kelas unik
        ]);

        // Menyimpan data kelas yang sudah divalidasi
        Kelas::create($validated);
        return redirect()->route('kelas.index')->with("success", "Berhasil menambahkan data kelas!");
    }

    public function edit(Kelas $kelas) {
        // Menampilkan form untuk edit data kelas
        return view("pages.kelas.edit", ["kelas" => $kelas]);
    }

    public function update(Request $request, Kelas $kelas) {
        // Validasi input untuk update
        $validated = $request->validate([
            "tingkat" => "required|string|in:10,11,12",
            "nama_kelas" => "required|string|max:255",
            "kode_kelas" => "required|string|max:10|unique:kelas,kode_kelas," . $kelas->id,  // Perbarui validasi untuk pengecekan kode kelas
        ]);

        // Update data kelas
        $kelas->update($validated);
        return redirect()->route("kelas.index")->with("success", "Data kelas berhasil diupdate");
    }

    public function delete(Kelas $kelas) {
        // Hapus data kelas
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus');
    }
}
