<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    /* ===========================
        INDEX (JOIN User)
    ============================ */
    public function index()
    {
        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.*', 'user.nama', 'user.email')
            ->get();

        return view('admin.pemilik.index', compact('pemilik'));
    }

    /* ===========================
        CREATE
    ============================ */
    public function create()
    {
        $user = DB::table('user')->get();
        return view('admin.pemilik.create', compact('user'));
    }

    /* ===========================
        STORE
    ============================ */
    public function store(Request $request)
    {
        $request->validate([
            'no_wa' => 'required|max:45',
            'alamat' => 'required|max:100',
            'iduser' => 'required'
        ]);

        DB::table('pemilik')->insert([
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
            'iduser' => $request->iduser
        ]);

        return redirect()->route('admin.pemilik.index')
                         ->with('success', 'Pemilik berhasil ditambahkan');
    }

    /* ===========================
        EDIT
    ============================ */
    public function edit($id)
    {
        $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
        $user = DB::table('user')->get();

        return view('admin.pemilik.edit', compact('pemilik', 'user'));
    }

    /* ===========================
        UPDATE
    ============================ */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_wa' => 'required|max:45',
            'alamat' => 'required|max:100',
            'iduser' => 'required'
        ]);

        DB::table('pemilik')
            ->where('idpemilik', $id)
            ->update([
                'no_wa' => $request->no_wa,
                'alamat' => $request->alamat,
                'iduser' => $request->iduser
            ]);

        return redirect()->route('admin.pemilik.index')
                         ->with('success', 'Pemilik berhasil diperbarui');
    }

    /* ===========================
        DELETE
    ============================ */
    public function destroy($id)
    {
        DB::table('pemilik')->where('idpemilik', $id)->delete();

        return redirect()->route('admin.pemilik.index')
                         ->with('success', 'Pemilik berhasil dihapus');
    }
}
