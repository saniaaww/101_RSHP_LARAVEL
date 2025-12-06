<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\RekamMedis;
use App\Models\DetailRekamMedis;
use App\Models\TemuDokter;

class DokterDashboardController extends Controller
{
    public function index()
    {
        return view('dokter.dashboard', [
            // --- Statistik ---
            'total_pasien' => Pet::count(),
            'total_rekam_medis' => RekamMedis::count(),
            'total_detail_rekam_medis' => DetailRekamMedis::count(),

            // --- Semua pasien ---
            'semua_pasien' => Pet::with(['pemilik', 'ras'])->get(),

            // --- Pasien hari ini (urutan berdasarkan no_urut) ---
            'pasien_hari_ini' => TemuDokter::with(['pet.pemilik'])
                ->whereDate('waktu_daftar', today())
                ->orderBy('no_urut', 'asc')
                ->get(),

            // --- Profil dokter ---
            'dokter' => auth()->user(),
        ]);
    }
}
