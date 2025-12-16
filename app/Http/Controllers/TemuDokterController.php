<?php

namespace App\Http\Controllers;

use App\Models\TemuDokter;
use App\Models\Pet;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TemuDokterController extends Controller
{
    public function index()
    {
        $data = TemuDokter::with(['pet','dokter.user'])->orderBy('waktu_daftar')->orderBy('no_urut')->get();

        $role = auth()->user()->role_name;

        return match ($role) {
            'Administrator' => view('admin.temu_dokter.index', compact('data')),
            'Resepsionis'   => view('resepsionis.temu_dokter.index', compact('data')),
            'Dokter'        => view('dokter.temu_dokter.index', compact('data')),
            'Perawat'       => view('perawat.temu_dokter.index', compact('data')),
            'Pemilik'       => view('pemilik.temu_dokter.index', compact('data')),
            default         => abort(403, 'Unauthorized')
        };
    }

  public function create()
{
    $pet = Pet::all();

    $dokter = RoleUser::with('user')
        ->whereHas('role', function ($q) {
            $q->where('nama_role', 'Dokter');
        })
        ->where('status', 1)
        ->get();

    $role = auth()->user()->role_name;

    return match ($role) {
        'Administrator' => view('admin.temu_dokter.create', compact('pet','dokter')),
        'Resepsionis'   => view('resepsionis.temu_dokter.create', compact('pet','dokter')),
        'Dokter'        => view('dokter.temu_dokter.create', compact('pet','dokter')),
        'Perawat'       => view('perawat.temu_dokter.create', compact('pet','dokter')),
        default         => abort(403, 'Unauthorized')
    };
}


public function store(Request $request)
{
    $request->validate([
        'idpet' => 'required',
        'idrole_user' => 'required',
        'status' => 'required'
    ]);

    $today = \Carbon\Carbon::now('Asia/Jakarta')->toDateString();

    $lastNo = \App\Models\TemuDokter::whereDate('waktu_daftar', $today)
                ->max('no_urut');

    \App\Models\TemuDokter::create([
        'no_urut' => $lastNo ? $lastNo + 1 : 1,
        'waktu_daftar' => \Carbon\Carbon::now('Asia/Jakarta'),
        'status' => $request->status,
        'idpet' => $request->idpet,
        'idrole_user' => $request->idrole_user,
    ]);

    // ambil role aktif user
    $role = auth()->user()->role_name;

    // redirect sesuai role
    if ($role === 'Administrator') {
        return redirect()->route('admin.temu-dokter.index')
            ->with('success','Reservasi ditambahkan');
    } elseif ($role === 'Resepsionis') {
        return redirect()->route('resepsionis.temu-dokter.index')
            ->with('success','Reservasi ditambahkan');
    }

    // default kalau role tidak dikenali
    abort(403, 'Unauthorized');
}



  public function edit($id)
{
    $data = TemuDokter::findOrFail($id);

    $dokter = RoleUser::with('user')
        ->whereHas('role', function ($q) {
            $q->where('nama_role', 'Dokter');
        })
        ->where('status', 1)
        ->get();

    $pet = Pet::all();
    $role = auth()->user()->role_name;

    return match ($role) {
        'Administrator' => view('admin.temu_dokter.edit', compact('data','pet','dokter')),
        'Resepsionis'   => view('resepsionis.temu_dokter.edit', compact('data','pet','dokter')),
        default         => abort(403)
    };
}


    public function update(Request $request, $id)
    {
        TemuDokter::findOrFail($id)->update($request->all());
        $role = auth()->user()->role_name;

        return match ($role) {
            'Administrator' => redirect()->route('admin.temu-dokter.index')->with('success','Reservasi dokter diperbarui'),
            'Resepsionis'   => redirect()->route('resepsionis.temu-dokter.index')->with('success','Reservasi dokter diperbarui'),
            'Dokter'        => redirect()->route('dokter.temu-dokter.index')->with('success','Reservasi dokter diperbarui'),
            'Perawat'       => redirect()->route('perawat.temu-dokter.index')->with('success','Reservasi dokter diperbarui'),
            default         => abort(403, 'Unauthorized')
        };
    }

    public function destroy($id)
    {
        TemuDokter::findOrFail($id)->delete();
        $role = auth()->user()->role_name;

        return match ($role) {
            'Administrator' => redirect()->route('admin.temu-dokter.index')->with('success','Reservasi dihapus'),
            'Resepsionis'   => redirect()->route('resepsionis.temu-dokter.index')->with('success','Reservasi dihapus'),
            'Dokter'        => redirect()->route('dokter.temu-dokter.index')->with('success','Reservasi dihapus'),
            'Perawat'       => redirect()->route('perawat.temu-dokter.index')->with('success','Reservasi dihapus'),
            default         => abort(403, 'Unauthorized')
        };
    }
}
