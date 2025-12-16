<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perawat;

class PerawatController extends Controller
{
    public function dashboard()
    {
        return view('perawat.dashboard');
    }

    public function pasien()
    {
        $pasien = \App\Models\Pet::all();
        return view('perawat.pet.index', compact('pasien'));
    }

    // ================================
    // PROFIL PERAWAT (SESUAI DOKTER)
    // ================================

    public function profilIndex()
    {
        $user = auth()->user();
        $perawat = Perawat::where('iduser', $user->iduser)->first();

        return view('perawat.profil.index', compact('user', 'perawat'));
    }

    public function profilEdit()
    {
        $user = auth()->user();
        $perawat = Perawat::where('iduser', $user->iduser)->first();

        return view('perawat.profil.edit', compact('user', 'perawat'));
    }

    public function profilUpdate(Request $request)
    {
        $user = auth()->user();
        $perawat = Perawat::where('iduser', $user->iduser)->first();

        $perawat->update([
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan'    => $request->pendidikan,
        ]);

        return redirect()->route('perawat.profil.index')
                         ->with('success', 'Profil berhasil diperbarui!');
    }
}
