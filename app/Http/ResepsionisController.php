<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TemuDokter;

class ResepsionisController extends Controller
{
    public function index()
    {
        $data = TemuDokter::with(['pet', 'roleUser'])->get();
        return view('resepsionis.dashboard', compact('data'));
    }
}
