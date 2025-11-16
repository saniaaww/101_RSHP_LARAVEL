<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pet;
use App\Models\Pemilik;

class PemilikController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // CARI DATA PEMILIK BERDASARKAN USER YANG LOGIN
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        if (!$pemilik) {
            return abort(404, "Data pemilik tidak ditemukan untuk user ini.");
        }

        // AMBIL SEMUA PET MILIK PEMILIK INI
        $data = Pet::where('idpemilik', $pemilik->idpemilik)->get();

        return view('pemilik.dashboard', compact('data'));
    }
}
