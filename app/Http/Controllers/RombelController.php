<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Menampilkan daftar seluruh data rombel.
     */
    public function index() {
        // Lakukan eager load untuk relasi kelas dan siswa
        $rombels = Rombel::with(['kelas', 'siswa'])->get();
        return view('pages.rombel.index', compact('rombels'));
    }

    /**
     * Menampilkan form untuk membuat data rombel baru.
     */
    public function create() {
        $kelas = Kelas::all();
        // Ambil seluruh data siswa untuk dipilih (menggunakan field nama_lengkap pada view)
        $siswas = Siswa::all();
        return view('pages.rombel.create', compact('kelas', 'siswas'));
    }

    /**
     * Menyimpan data rombel yang baru ke database.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'tahun_pelajaran' => ['required', 'regex:/^\d{4}\/\d{4}$/'],
            'semester'        => 'required|in:ganjil,genap',
            'kelas_id'        => 'required|exists:kelas,id',
            // Ganti validasi sebelumnya yang menggunakan 'nama_siswa'
            // dengan validasi untuk siswa_id yang mengacu ke data siswa
            'siswa_id'        => 'required|exists:siswas,id',
        ]);

        // Cek apakah kombinasi tahun pelajaran, semester, dan kelas sudah ada
        $exists = Rombel::where('tahun_pelajaran', $validated['tahun_pelajaran'])
            ->where('semester', $validated['semester'])
            ->where('kelas_id', $validated['kelas_id'])
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors([
                'kelas_id' => 'Kombinasi tahun pelajaran, semester, dan kelas sudah ada dalam database.',
            ])->withInput();
        }

        // Menyimpan data rombel dengan siswa_id sebagai referensi
        Rombel::create($validated);
        return redirect()->route('rombel.index')->with('success', 'Berhasil menambahkan data rombel!');
    }

    /**
     * Menampilkan form untuk mengedit data rombel.
     */
    public function edit(Rombel $rombel) {
        $kelas = Kelas::all();
        // Sertakan juga daftar siswa agar user dapat memilih data siswa (nama lengkap)
        $siswas = Siswa::all();
        return view('pages.rombel.edit', compact('rombel', 'kelas', 'siswas'));
    }

    /**
     * Memperbarui data rombel yang sudah ada di database.
     */
    public function update(Request $request, Rombel $rombel) {
        $validated = $request->validate([
            'tahun_pelajaran' => ['required', 'regex:/^\d{4}\/\d{4}$/'],
            'semester'        => 'required|in:ganjil,genap',
            'kelas_id'        => 'required|exists:kelas,id',
            'siswa_id'        => 'required|exists:siswas,id',
        ]);

        // Pastikan kombinasi tidak duplikat (selain data yang sedang diupdate)
        $exists = Rombel::where('tahun_pelajaran', $validated['tahun_pelajaran'])
            ->where('semester', $validated['semester'])
            ->where('kelas_id', $validated['kelas_id'])
            ->where('id', '!=', $rombel->id)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors([
                'kelas_id' => 'Kombinasi tahun pelajaran, semester, dan kelas sudah ada dalam database.',
            ])->withInput();
        }

        // Memperbarui data rombel dengan siswa_id sebagai referensi
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
