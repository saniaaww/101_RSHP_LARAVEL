<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKlinis;
use Illuminate\Http\Request;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $data = KategoriKlinis::all();
        return view('admin.kategori_klinis.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategori_klinis.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateKategoriKlinis($request);
        $validated['nama_kategori_klinis'] = $this->formatNamaKategoriKlinis($validated['nama_kategori_klinis']);
        $this->createKategoriKlinis($validated);

        return redirect()->route('admin.kategori-klinis.index')->with('success', 'Kategori klinis berhasil ditambahkan.');
    }

    private function validateKategoriKlinis($request)
    {
        return $request->validate([
            'nama_kategori_klinis' => 'required|string|max:50|unique:kategori_klinis,nama_kategori_klinis'
        ]);
    }

    private function createKategoriKlinis($data)
    {
        KategoriKlinis::create($data);
    }

    private function formatNamaKategoriKlinis($nama)
    {
        return ucwords(strtolower($nama));
    }
}
