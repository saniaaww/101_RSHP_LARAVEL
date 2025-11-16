<?php

namespace App\Http\Controllers;

use App\Models\TemuDokter;

class PerawatController extends Controller
{
    public function index()
    {
        $data = TemuDokter::with(['pet', 'roleUser.role'])
                ->orderBy('no_urut', 'asc')
                ->get();

        return view('perawat.dashboard', compact('data'));
    }
}
