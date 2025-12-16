<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    public function index()
    {
        $roleUser = auth()->user()->roleUser->where('status', 1)->first();

        $data = \App\Models\TemuDokter::with(['pet'])
                ->where('idrole_user', $roleUser->idrole_user)
                ->orderBy('no_urut', 'asc')
                ->get();

        return view('dokter.dashboard', compact('data'));
    }

    public function dashboard()
    {
        return $this->index();
    }

    /* ==========================
        PROFIL DOKTER
    ===========================*/

    public function profilIndex()
    {
        $user = auth()->user();                 // user login
        $dokter = Dokter::where('iduser', $user->iduser)->first();   // FIX: pakai iduser

        return view('dokter.profil.index', compact('user', 'dokter'));
    }

    public function profilEdit()
    {
        $user = auth()->user();
        $dokter = Dokter::where('iduser', $user->iduser)->first();   // FIX: pakai iduser

        return view('dokter.profil.edit', compact('user', 'dokter'));
    }

    public function profilUpdate(Request $request)
    {
        $user = auth()->user();
        $dokter = Dokter::where('iduser', $user->iduser)->first();   // FIX: pakai iduser

        $dokter->update([
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'bidang_dokter' => $request->bidang_dokter,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('dokter.profil.index')
            ->with('success', 'Profil diperbarui');
    }
}
