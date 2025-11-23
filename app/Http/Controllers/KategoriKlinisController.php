<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriKlinisController extends Controller
{
    /* =====================================
        INDEX
    ====================================== */
    public function index()
    {
        $kategori = DB::table('kategori_klinis')->get();
        return view('admin.kategori_klinis.index', compact('kategori'));
    }

    /* =====================================
        CREATE
    ====================================== */
    public function create()
    {
        return view('admin.kategori_klinis.create');
    }

    /* =====================================
        STORE (Insert)
    ====================================== */
    public function store(Request $request)
    {
        $this->validateData($request);

        DB::table('kategori_klinis')->insert([
            'nama_kategori_klinis' => $request->nama_kategori_klinis
        ]);

        return redirect()->route('admin.kategori-klinis.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    /* =====================================
        EDIT (Select by ID)
    ====================================== */
    public function edit($id)
    {
        $kategori = DB::table('kategori_klinis')
                        ->where('idkategori_klinis', $id)
                        ->first();

        return view('admin.kategori_klinis.edit', compact('kategori'));
    }
    

    /* =====================================
        UPDATE
    ====================================== */
    public function update(Request $request, $id)
    {
        $this->validateData($request);

        DB::table('kategori_klinis')
            ->where('idkategori_klinis', $id)
            ->update([
                'nama_kategori_klinis' => $request->nama_kategori_klinis
            ]);

        return redirect()->route('admin.kategori-klinis.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    /* =====================================
        DELETE
    ====================================== */
    public function destroy($id)
    {
        DB::table('kategori_klinis')
            ->where('idkategori_klinis', $id)
            ->delete();

        return redirect()->route('admin.kategori-klinis.index')
                         ->with('success', 'Data berhasil dihapus');
    }

    /* =====================================
        VALIDATION
    ====================================== */
    private function validateData(Request $request)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:50'
        ]);
    }
}
