<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemuDokter;

class ResepsionisController extends Controller
{
    // DASHBOARD
    public function dashboard()
    {
        // Jika temu dokter hanya butuh pet, maka: with('pet')
        $data = TemuDokter::with(['pet'])->get();

        return view('resepsionis.dashboard', compact('data'));
    }
}
