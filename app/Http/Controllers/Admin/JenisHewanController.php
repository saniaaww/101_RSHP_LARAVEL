<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisHewan;
use Illuminate\Http\Request;

class JenisHewanController extends Controller
{
    public function index()
    {
    $jenis = JenisHewan::all();
    return view('admin.jenis.index', compact('jenis'));
    }


    public function create()
    {
        return view('admin.jenis.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateJenisHewan($request);
        $validated['nama_jenis_hewan'] = $this->formatNamaJenisHewan($validated['nama_jenis_hewan']);
        $this->createJenisHewan($validated);

        return redirect()->route('admin.jenis.index')->with('success', 'Jenis hewan berhasil ditambahkan.');
    }

    private function validateJenisHewan($request)
    {
        return $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100|unique:jenis_hewan,nama_jenis_hewan'
        ]);
    }

    private function createJenisHewan($data)
    {
        JenisHewan::create($data);
    }

    private function formatNamaJenisHewan($nama)
    {
        return ucwords(strtolower($nama));
    }
}
