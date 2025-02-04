<?php


namespace App\Http\Controllers;

use App\Models\Pengajar;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index() {
        // Mengambil data pengajar beserta relasi guru, kelas, dan mata pelajaran
        $pengajars = Pengajar::with('guru', 'kelas', 'mataPelajaran')->get();
        return view("pages.pengajar.index", ["pengajars" => $pengajars]);
    }

    public function create() {
        $gurus = Guru::all();
        $kelas = Kelas::all();
        $mataPelajarans = MataPelajaran::all();
        
        return view("pages.pengajar.create", compact('gurus', 'kelas', 'mataPelajarans'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "tahun_pelajaran"      => "required|string|regex:/^\d{4}\/\d{4}$/",
            "semester"             => "required|string|in:genap,ganjil",
            "guru_id"              => "required|exists:gurus,id",
            "mata_pelajaran_id"    => "required|exists:mata_pelajarans,id",
            "kelas_id"             => "required|exists:kelas,id"
        ]);

        Pengajar::create($validated);

        return redirect()->route('pengajar.index')->with("success", "Berhasil menambahkan data pengajar!");
    }

    public function edit(Pengajar $pengajar) {
        $gurus = Guru::all();
        $kelas = Kelas::all();
        $mataPelajarans = MataPelajaran::all();
        
        return view("pages.pengajar.edit", compact('pengajar', 'gurus', 'kelas', 'mataPelajarans'));
    }

    public function update(Request $request, Pengajar $pengajar) {
        $validated = $request->validate([
            "tahun_pelajaran"      => "required|string|regex:/^\d{4}\/\d{4}$/",
            "semester"             => "required|string|in:genap,ganjil",
            "guru_id"              => "required|exists:gurus,id",
            "mata_pelajaran_id"    => "required|exists:mata_pelajarans,id",
            "kelas_id"             => "required|exists:kelas,id"
        ]);

        $pengajar->update($validated);

        return redirect()->route("pengajar.index")->with("success", "Data berhasil diupdate");
    }

    public function delete(Pengajar $pengajar) {
        $pengajar->delete();
        return redirect()->route('pengajar.index')->with('success', 'Data berhasil dihapus');
    }
}
