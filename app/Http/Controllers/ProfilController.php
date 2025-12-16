<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dokter;
use App\Models\Perawat;
use App\Models\Pemilik;

class ProfilController extends Controller
{
    // Menentukan model dan folder view berdasarkan role
    private function resolveRole()
    {
        $user = Auth::user();
        $role = $user->role; // pastikan field role ada di tabel users

        switch ($role) {
            case 'dokter':
                return (object) [
                    'viewPath' => 'dokter.profil.',
                    'model' => Dokter::class,
                    'key' => 'iddokter'
                ];

            case 'perawat':
                return (object) [
                    'viewPath' => 'perawat.profil.',
                    'model' => Perawat::class,
                    'key' => 'idperawat'
                ];

            case 'pemilik':
                return (object) [
                    'viewPath' => 'pemilik.profil.',
                    'model' => Pemilik::class,
                    'key' => 'idpemilik'
                ];

            default:
                abort(403, 'Role tidak dikenal.');
        }
    }

    // =========================
    // TAMPIL PROFIL
    // =========================
    public function index()
    {
        $config = $this->resolveRole();
        $user = Auth::user();

        $profil = $config->model::where('iduser', $user->id)->first();

        return view($config->viewPath . 'index', compact('user', 'profil'));
    }

    // =========================
    // FORM EDIT PROFIL
    // =========================
    public function edit()
    {
        $config = $this->resolveRole();
        $user = Auth::user();

        $profil = $config->model::where('iduser', $user->id)->first();

        return view($config->viewPath . 'edit', compact('user', 'profil'));
    }

    // =========================
    // UPDATE PROFIL
    // =========================
    public function update(Request $request)
    {
        $config = $this->resolveRole();
        $user = Auth::user();

        $profil = $config->model::where('iduser', $user->id)->first();

        if (!$profil) {
            return back()->with('error', 'Profil tidak ditemukan.');
        }

        // Update field berdasarkan role
        if ($user->role == 'dokter') {
            $request->validate([
                'alamat' => 'required',
                'no_hp' => 'required',
                'bidang_dokter' => 'required',
                'jenis_kelamin' => 'required',
            ]);

            $profil->update([
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'bidang_dokter' => $request->bidang_dokter,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
        }

        if ($user->role == 'perawat') {
            $request->validate([
                'alamat' => 'required',
                'no_hp' => 'required',
                'jenis_kelamin' => 'required',
                'pendidikan' => 'required',
            ]);

            $profil->update([
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pendidikan' => $request->pendidikan,
            ]);
        }

        if ($user->role == 'pemilik') {
            $request->validate([
                'alamat' => 'required',
                'no_wa' => 'required',
            ]);

            $profil->update([
                'alamat' => $request->alamat,
                'no_wa' => $request->no_wa,
            ]);
        }

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
