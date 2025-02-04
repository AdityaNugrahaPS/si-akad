<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use App\Models\Kelas;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Menampilkan daftar seluruh data rombel.
     */
    public function index() {
        $rombels = Rombel::with('kelas')->get();
        return view('pages.rombel.index', compact('rombels'));
    }

    /**
     * Menampilkan form untuk membuat data rombel baru.
     */
    public function create() {
        $kelas = Kelas::all();
        return view('pages.rombel.create', compact('kelas'));
    }

    /**
     * Menyimpan data rombel yang baru ke database.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'tahun_pelajaran' => ['required', 'regex:/^\d{4}\/\d{4}$/'],
            'semester'        => 'required|in:ganjil,genap',
            'kelas_id'        => 'required|exists:kelas,id',
            'nama_siswa'      => 'required|string|max:255',
        ]);

        // Cek apakah kombinasi sudah ada
        $exists = Rombel::where('tahun_pelajaran', $request->tahun_pelajaran)
            ->where('semester', $request->semester)
            ->where('kelas_id', $request->kelas_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors([
                'kelas_id' => 'Kombinasi tahun pelajaran, semester, dan kelas sudah ada dalam database.',
            ])->withInput();
        }

        Rombel::create($validated);
        return redirect()->route('rombel.index')->with('success', 'Berhasil menambahkan data rombel!');
    }

    /**
     * Menampilkan form untuk mengedit data rombel.
     */
    public function edit(Rombel $rombel) {
        $kelas = Kelas::all();
        return view('pages.rombel.edit', compact('rombel', 'kelas'));
    }

    /**
     * Memperbarui data rombel yang sudah ada di database.
     */
    public function update(Request $request, Rombel $rombel) {
        $validated = $request->validate([
            'tahun_pelajaran' => ['required', 'regex:/^\d{4}\/\d{4}$/'],
            'semester'        => 'required|in:ganjil,genap',
            'kelas_id'        => 'required|exists:kelas,id',
            'nama_siswa'      => 'required|string|max:255',
        ]);

        // Pastikan kombinasi tidak duplikat sebelum update
        $exists = Rombel::where('tahun_pelajaran', $request->tahun_pelajaran)
            ->where('semester', $request->semester)
            ->where('kelas_id', $request->kelas_id)
            ->where('id', '!=', $rombel->id) // Hindari diri sendiri
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors([
                'kelas_id' => 'Kombinasi tahun pelajaran, semester, dan kelas sudah ada dalam database.',
            ])->withInput();
        }

        $rombel->update($validated);
        return redirect()->route('rombel.index')->with('success', 'Data rombel berhasil diupdate');
    }

    /**
     * Menghapus data rombel dari database.
     */
    public function delete(Rombel $rombel) {
        $rombel->delete();
        return redirect()->route('rombel.index')->with('success', 'Data rombel berhasil dihapus');
    }
}
