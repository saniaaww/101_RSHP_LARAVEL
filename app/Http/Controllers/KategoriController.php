<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        return view('admin.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateKategori($request);
        $validated['nama_kategori'] = $this->formatNamaKategori($validated['nama_kategori']);
        $this->createKategori($validated);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    private function validateKategori($request)
    {
        return $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori'
        ]);
    }

    private function createKategori($data)
    {
        Kategori::create($data);
    }

    private function formatNamaKategori($nama)
    {
        return ucwords(strtolower($nama));
    }
}
