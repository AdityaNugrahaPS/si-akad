<?php

namespace App\Http\Controllers;

use App\Models\TahunPelajaran;
use App\Models\Guru;
use Illuminate\Http\Request;

class TahunPelajaranController extends Controller
{
    public function index()
    {
        // Mengambil semua data tahun pelajaran
        $tahunPelajarans = TahunPelajaran::with('guru')->get();

        // Mengirim data ke view
        return view('pages.tahun-pelajaran.index', compact('tahunPelajarans'));
    }


    public function create(Request $request)
    {
        // Mendapatkan daftar guru untuk dipilih
        $gurus = Guru::all();
        return view("pages.tahun-pelajaran.create", ["gurus" => $gurus]);
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            "status" => "required|string|in:Aktif,Tidak Aktif", // Status harus antara 'Aktif' atau 'Tidak Aktif'
            "tahun" => "required|regex:/^\d{4}\/\d{4}$/",
            "semester" => "required|string|in:Ganjil,Genap", // Semester harus 'Ganjil' atau 'Genap'
            "guru_id" => "required|exists:gurus,id",  // Memastikan guru yang dipilih ada di database
            "tanggal_rapor" => "required|date",  // Validasi tanggal
        ]);

        // Menyimpan data tahun pelajaran
        TahunPelajaran::create($validated);

        return redirect()->route('tahun-pelajaran.index')->with("success", "Berhasil menambahkan data tahun pelajaran!");
    }

    public function edit(TahunPelajaran $tahunPelajaran)
    {
        // Mendapatkan daftar guru untuk dipilih dan data tahun pelajaran yang akan diedit
        $gurus = Guru::all();
        return view("pages.tahun-pelajaran.edit", ["tahunPelajaran" => $tahunPelajaran, "gurus" => $gurus]);
    }

    public function update(Request $request, TahunPelajaran $tahunPelajaran)
    {
        // Validasi data
        $validated = $request->validate([
            "status" => "required|string|in:Aktif,Tidak Aktif",
            "tahun" => "required|regex:/^\d{4}\/\d{4}$/",
            "semester" => "required|string|in:Ganjil,Genap",
            "guru_id" => "required|exists:gurus,id",
            "tanggal_rapor" => "required|date",
        ]);

        // Memperbarui data tahun pelajaran
        $tahunPelajaran->update($validated);

        return redirect()->route("tahun-pelajaran.index")->with("success", "Data berhasil diperbarui");
    }

    public function delete(TahunPelajaran $tahunPelajaran)
    {
        // Menghapus data tahun pelajaran
        $tahunPelajaran->delete();
        return redirect()->route('tahun-pelajaran.index')->with('success', 'Data berhasil dihapus');
    }

    public function aktifkan($id)
    {
        // Menemukan tahun pelajaran yang ingin diaktifkan
        $tahunPelajaran = TahunPelajaran::findOrFail($id);
    
        // Cek jika ada tahun pelajaran yang sudah aktif, ubah jadi tidak aktif
        TahunPelajaran::where('status', 'Aktif')->update(['status' => 'Tidak Aktif']);
    
        // Aktifkan tahun pelajaran yang dipilih
        $tahunPelajaran->status = 'Aktif';
        $tahunPelajaran->save();
    
        return redirect()->route('tahun-pelajaran.index')->with('success', 'Tahun Pelajaran berhasil diaktifkan.');
    }
    
}
