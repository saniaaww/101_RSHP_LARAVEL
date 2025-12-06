<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perawat;
use App\Models\Pet;  // pasien
use App\Models\RekamMedis;

class PerawatController extends Controller
{
    public function dashboard()
    {
        return view('perawat.dashboard');
    }

    public function pasien()
    {
        $pasien = Pet::all();
        return view('perawat.pet.index', compact('pasien'));
    }

    public function profil()
    {
        $perawat = Perawat::where('iduser', auth()->id())->firstOrFail();
        return view('perawat.profil.index', compact('perawat'));
    }

    public function index()
    {
    $perawat = Perawat::where('iduser', auth()->id())->first();

    return view('perawat.profil.index', compact('perawat'));
    }


}
