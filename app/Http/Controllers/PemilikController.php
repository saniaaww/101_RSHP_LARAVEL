<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    /* ============================================================
        INDEX
        - Resepsionis: melihat semua pemilik (CRUD)
        - Pemilik: melihat profil dirinya sendiri (READ)
    ============================================================= */
    public function index()
    {
        $role = auth()->user()->role_name;

        // ================= RESEPSIONIS =================
        if ($role === 'Resepsionis') {
            $pemilik = DB::table('pemilik')
                ->join('user', 'pemilik.iduser', '=', 'user.iduser')
                ->select('pemilik.*', 'user.nama', 'user.email')
                ->get();

            return view('resepsionis.pemilik.index', compact('pemilik'));
        }

        // ================= PEMILIK =================
        if ($role === 'Pemilik') {
            $userId = auth()->user()->iduser;

            $pemilik = DB::table('pemilik')
                ->join('user', 'pemilik.iduser', '=', 'user.iduser')
                ->select('pemilik.*', 'user.nama', 'user.email')
                ->where('pemilik.iduser', $userId)
                ->first();

            return view('pemilik.profil.index', compact('pemilik'));
        }

        abort(403, 'Unauthorized');
    }

    /* ============================================================
        CREATE - untuk RESEPSIONIS saja
    ============================================================= */
    public function create()
    {
        $this->authorizeResepsionis();

        $user = DB::table('user')->get();
        return view('resepsionis.pemilik.create', compact('user'));
    }

    /* ============================================================
        STORE - untuk RESEPSIONIS saja
    ============================================================= */
    public function store(Request $request)
    {
        $this->authorizeResepsionis();

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

        return redirect()->route('resepsionis.pemilik.index')
                         ->with('success', 'Pemilik berhasil ditambahkan');
    }

    /* ============================================================
        EDIT - untuk RESEPSIONIS saja
    ============================================================= */
    public function edit($id)
    {
        $this->authorizeResepsionis();

        $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
        $user = DB::table('user')->get();

        return view('resepsionis.pemilik.edit', compact('pemilik', 'user'));
        
    }

    /* ============================================================
        UPDATE - untuk RESEPSIONIS saja
    ============================================================= */
    public function update(Request $request, $id)
    {
        $this->authorizeResepsionis();

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

        return redirect()->route('resepsionis.pemilik.index')
                         ->with('success', 'Pemilik berhasil diperbarui');
    }

    /* ============================================================
        DELETE - untuk RESEPSIONIS saja
    ============================================================= */
    public function destroy($id)
    {
        $this->authorizeResepsionis();

        DB::table('pemilik')->where('idpemilik', $id)->delete();

        return redirect()->route('resepsionis.pemilik.index')
                         ->with('success', 'Pemilik berhasil dihapus');
    }

    /* ============================================================
        HELPER
    ============================================================= */
    private function authorizeResepsionis()
    {
        if (auth()->user()->role_name !== 'Resepsionis') {
            abort(403, 'Unauthorized');
        }
    }

    public function dashboard()
    {
        // Ambil user login
        $user = auth()->user();

        // Ambil data pemilik berdasarkan iduser
        $pemilik = DB::table('pemilik')
                    ->where('iduser', $user->iduser)
                    ->first();

        // Arahkan ke tampilan dashboard PEMILIK, BUKAN profil
        return view('pemilik.dashboard', compact('user', 'pemilik'));
    }


    public function profil()
    {
        $user = auth()->user();

        $pemilik = DB::table('pemilik')
            ->where('iduser', $user->iduser)
            ->first();

        return view('pemilik.profil.index', compact('user', 'pemilik'));
    }

}
