<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pemilik;

class PemilikController extends Controller
{
    /* ============================================================
        RESEPSIONIS — CRUD PEMILIK
    ============================================================= */
    private function authorizeResepsionis()
    {
        if (auth()->user()->role_name !== 'Resepsionis') {
            abort(403, 'Unauthorized');
        }
    }

    public function index()
    {
        $role = auth()->user()->role_name;

        // Jika resepsionis → tampilkan semua pemilik
        if ($role === 'Resepsionis') {
            $pemilik = DB::table('pemilik')
                ->join('user', 'pemilik.iduser', '=', 'user.iduser')
                ->select('pemilik.*', 'user.nama', 'user.email')
                ->get();

            return view('resepsionis.pemilik.index', compact('pemilik'));
        }

        // Jika pemilik → arahkan ke profil
        if ($role === 'Pemilik') {
            return redirect()->route('pemilik.dashboard');
        }

        abort(403, 'Unauthorized');
    }

    public function create()
    {
        $this->authorizeResepsionis();

        $user = DB::table('user')->get();
        return view('resepsionis.pemilik.create', compact('user'));
    }

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

    public function edit($id)
    {
        $this->authorizeResepsionis();

        $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
        $user = DB::table('user')->get();

        return view('resepsionis.pemilik.edit', compact('pemilik', 'user'));
    }

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

    public function destroy($id)
    {
        $this->authorizeResepsionis();

        DB::table('pemilik')->where('idpemilik', $id)->delete();

        return redirect()->route('resepsionis.pemilik.index')
                         ->with('success', 'Pemilik berhasil dihapus');
    }

    /* ============================================================
        PEMILIK — DASHBOARD & PROFIL
    ============================================================= */

    public function dashboard()
    {
        $user = auth()->user();

        $pemilik = DB::table('pemilik')
                    ->where('iduser', $user->iduser)
                    ->first();

        return view('pemilik.dashboard', compact('user', 'pemilik'));
    }

    public function profilIndex()
    {
        $user = auth()->user();
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        return view('pemilik.profil.index', compact('user', 'pemilik'));
    }

    public function profilEdit()
    {
        $user = auth()->user();
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        return view('pemilik.profil.edit', compact('user', 'pemilik'));
    }

    public function profilUpdate(Request $request)
    {
        $user = auth()->user();
        $pemilik = Pemilik::where('iduser', $user->iduser)->first();

        $pemilik->update([
            'alamat' => $request->alamat,
            'no_wa' => $request->no_wa,
        ]);

        return redirect()->route('pemilik.profil.index')
                         ->with('success', 'Profil diperbarui');
    }
}
