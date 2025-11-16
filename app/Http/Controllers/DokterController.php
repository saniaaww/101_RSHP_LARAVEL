<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}

