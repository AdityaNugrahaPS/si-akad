<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index() {
        $profile = Profile::firstOrCreate([
            'nama_sekolah' => 'Pondok Pesantren Khairul Ummah 2 Pekanbaru',
            'alamat' => 'Jl. Gajah (Setelah BPMP Riau ) RT 01/ RW 13 Kelurahan Bambukuning',
            'npsn' => '10101010101',
        ]);
        
        return view("pages.profile.index", [
            "profile" => $profile
        ]);
    }

    public function edit(){
        $profile = Profile::firstOrCreate([
            'nama_sekolah' => 'Pondok Pesantren Khairul Ummah 2 Pekanbaru',
            'alamat' => 'Jl. Gajah (Setelah BPMP Riau ) RT 01/ RW 13 Kelurahan Bambukuning',
            'npsn' => '10101010101',
        ]);
        
        return view("pages.profile.edit", [
            "profile" => $profile
        ]);
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'bentuk_sekolah' => 'nullable|string|max:255',
            'npsn' => 'required|string|max:50',
            'alamat' => 'required|string|max:500',
            'desa_kelurahan' => 'nullable|string|max:255',
            'kabupaten_kota' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
            'kode_pos' => 'nullable|string|max:10',
            'telp' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'image' => 'nullable|file|mimes:jpeg,jpg,png|max:2048',
        ], [
            'image.required' => 'Photo profile harus diunggah.',
            'image.mimes'    => 'Photo profile harus berupa PNG, JPEG, atau JPG.',
            'image.max'      => 'Ukuran photo profile tidak boleh lebih dari 2MB.',
        ]);

        
        $profile = Profile::firstOrNew();
        
        if ($request->hasFile('image')) {
            if ($profile->photo_profile) {
                Storage::disk('public')->delete($profile->photo_profile);
            }
            
            $validated['photo_profile'] = $request->file('image')->store('images/profile', 'public');
        }

        $profile->fill($validated);
        $profile->save();

        return redirect()->route('profile.index')->with('editProfileSuccess', 'Profil berhasil diupdate');
    }
}
