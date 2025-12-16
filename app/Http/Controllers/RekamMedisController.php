<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Dokter;
use App\Models\TemuDokter;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role_name;

        // ===== BASE QUERY (AMAN & LENGKAP) =====
        $query = RekamMedis::with([
            'dokter.user',
            'reservasi_dokter.pet'
        ])->orderBy('created_at', 'asc');

        // ===== KHUSUS PEMILIK =====
        if ($role === 'Pemilik') {
            $pemilikId = auth()->user()->pemilik?->idpemilik;

            $query->whereHas('reservasi_dokter.pet', function ($q) use ($pemilikId) {
                $q->where('idpemilik', $pemilikId);
            });
        }

        $rekamMedis = $query->get();


        // ===== VIEW SESUAI ROLE =====
        return match ($role) {
            'Administrator' => view('admin.rekam-medis.index', compact('rekamMedis')),
            'Dokter'        => view('dokter.rekam.index', compact('rekamMedis')),
            'Perawat'       => view('perawat.rekam.index', compact('rekamMedis')),
            'Pemilik'       => view('pemilik.rekam.index', compact('rekamMedis')),
            default         => abort(403, 'Unauthorized'),
        };
    }

    public function create()
    {
        $role = auth()->user()->role_name;

        $dokters = Dokter::with('user')->get();
        $reservasis = TemuDokter::with('pet')->get();

        return match ($role) {
            'Administrator' => view('admin.rekam-medis.create', compact('dokters', 'reservasis')),
            'Dokter'        => view('dokter.rekam.create', compact('dokters', 'reservasis')),
            'Perawat'       => view('perawat.rekam.create', compact('dokters', 'reservasis')),
            default         => abort(403, 'Unauthorized'),
        };
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
            'idreservasi_dokter',
        ]));

        return redirect()->back()->with('success', 'Rekam medis berhasil ditambahkan');
    }

    public function edit($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $dokters = Dokter::with('user')->get();
        $reservasis = TemuDokter::with('pet')->get();

        $role = auth()->user()->role_name;

        return match ($role) {
            'Administrator' => view('admin.rekam-medis.edit', compact('rekamMedis', 'dokters', 'reservasis')),
            'Dokter'        => view('dokter.rekam.edit', compact('rekamMedis', 'dokters', 'reservasis')),
            'Perawat'       => view('perawat.rekam.edit', compact('rekamMedis', 'dokters', 'reservasis')),
            default         => abort(403, 'Unauthorized'),
        };
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

        RekamMedis::findOrFail($id)->update($request->only([
            'anamnesa',
            'temuan_klinis',
            'diagnosa',
            'dokter_pemeriksa',
            'idreservasi_dokter',
        ]));

        return redirect()->back()->with('success', 'Rekam medis berhasil diperbarui');
    }

    public function destroy($id)
    {
        RekamMedis::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Rekam medis berhasil dihapus');
    }
}
