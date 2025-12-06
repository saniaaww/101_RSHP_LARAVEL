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

    public function profil()
    {
        // Pastikan ambil data dokter berdasarkan iduser yang login
        $dokter = Dokter::where('iduser', auth()->id())->firstOrFail();

        // Selalu arahkan ke folder 'dokter' (LOWERCASE)
        return view('dokter.profil.index', compact('dokter'));
    }
}
