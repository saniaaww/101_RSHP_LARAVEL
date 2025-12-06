<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pet;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::all();
        $role = auth()->user()->role_name;

        if ($role === 'Administrator') {
            return view('admin.rekam-medis.index', compact('rekamMedis'));

        } elseif ($role === 'Dokter') {
            return view('dokter.rekam.index', compact('rekamMedis'));

        } elseif ($role === 'Perawat') {
            // Perawat juga bisa CRUD → tampilkan view khusus perawat
            return view('perawat.rekam.index', compact('rekamMedis'));

        } elseif ($role === 'Pemilik') {
            // Pemilik hanya melihat rekam medis hewan miliknya
            $pemilik = auth()->user()->pemilik;
            $pemilikId = $pemilik?->idpemilik;

            $rekamMedis = RekamMedis::whereHas('reservasi_dokter.pet', function ($q) use ($pemilikId) {
                $q->where('idpemilik', $pemilikId);
            })->get();

            return view('pemilik.rekam.index', compact('rekamMedis'));
        }

        abort(403, 'Unauthorized');
    }

    public function create()
    {
        $role = auth()->user()->role_name;

        if (in_array($role, ['Administrator', 'Dokter', 'Perawat'])) {
            return view("$role.rekam.create");
        }

        abort(403, 'Unauthorized');
    }

    public function store(Request $request)
    {
        $request->validate([
            'anamnesa' => 'required',
            'temuan_klinis' => 'required',
            'diagnosa' => 'required',
            'dokter_pemeriksa' => 'required|integer',
            'idreservasi_dokter' => 'required|integer',
        ]);

        RekamMedis::create($request->only([
            'anamnesa',
            'temuan_klinis',
            'diagnosa',
            'dokter_pemeriksa',
            'idreservasi_dokter'
        ]));

        $role = auth()->user()->role_name;

        return match ($role) {
            'Administrator' => redirect()->route('admin.rekam-medis.index')->with('success', 'Rekam medis berhasil ditambahkan'),
            'Dokter'        => redirect()->route('dokter.rekam.index')->with('success', 'Rekam medis berhasil ditambahkan'),
            'Perawat'       => redirect()->route('perawat.rekam.index')->with('success', 'Rekam medis berhasil ditambahkan'),
            default         => abort(403, 'Unauthorized')
        };
    }

    public function edit($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $role = auth()->user()->role_name;

        if (in_array($role, ['Administrator', 'Dokter', 'Perawat'])) {
            return view("$role.rekam.edit", compact('rekamMedis'));
        }

        abort(403, 'Unauthorized');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'anamnesa' => 'required',
            'temuan_klinis' => 'required',
            'diagnosa' => 'required',
            'dokter_pemeriksa' => 'required|integer',
            'idreservasi_dokter' => 'required|integer',
        ]);

        $rekamMedis = RekamMedis::findOrFail($id);
        $rekamMedis->update($request->only([
            'anamnesa',
            'temuan_klinis',
            'diagnosa',
            'dokter_pemeriksa',
            'idreservasi_dokter'
        ]));

        $role = auth()->user()->role_name;

        return match ($role) {
            'Administrator' => redirect()->route('admin.rekam-medis.index')->with('success', 'Rekam medis berhasil diupdate'),
            'Dokter'        => redirect()->route('dokter.rekam.index')->with('success', 'Rekam medis berhasil diupdate'),
            'Perawat'       => redirect()->route('perawat.rekam.index')->with('success', 'Rekam medis berhasil diupdate'),
            default         => abort(403, 'Unauthorized')
        };
    }

    public function destroy($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $rekamMedis->delete();

        $role = auth()->user()->role_name;

        return match ($role) {
            'Administrator' => redirect()->route('admin.rekam-medis.index')->with('success', 'Rekam medis berhasil dihapus'),
            'Dokter'        => redirect()->route('dokter.rekam.index')->with('success', 'Rekam medis berhasil dihapus'),
            'Perawat'       => redirect()->route('perawat.rekam.index')->with('success', 'Rekam medis berhasil dihapus'),
            default         => abort(403, 'Unauthorized')
        };
    }
}
