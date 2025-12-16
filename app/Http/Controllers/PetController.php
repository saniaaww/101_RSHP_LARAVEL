<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;
use Illuminate\Http\Request;

class PetController extends Controller
{
    private function mapViewFolder(string $role): ?string
    {
        if ($role === 'Administrator') return 'admin';

        $lower = strtolower($role);

        if (in_array($lower, ['dokter', 'perawat', 'resepsionis', 'pemilik'], true)) {
            return $lower;
        }

        return null;
    }

    public function index()
    {
        $role = auth()->user()->role_name;
        $folder = $this->mapViewFolder($role);

        if (!$folder) {
            abort(403, 'Unauthorized');
        }

        // siapa yang boleh melihat semua pet
        if (in_array($role, ['Administrator', 'Dokter', 'Perawat', 'Resepsionis'], true)) {
            $pet = Pet::with(['ras', 'pemilik'])->get();
        }
        // pemilik hanya lihat pet miliknya
        elseif ($role === 'Pemilik') {
            $pemilik = auth()->user()->pemilik;
            $pemilikId = $pemilik?->idpemilik;
            $pet = Pet::with(['ras', 'pemilik'])
                ->when($pemilikId, fn($q) => $q->where('idpemilik', $pemilikId))
                ->get();
        } else {
            abort(403, 'Unauthorized');
        }

        return view("$folder.pet.index", compact('pet'));
    }

   public function create()
{
    $role = auth()->user()->role_name;

    if (!in_array($role, ['Administrator', 'Resepsionis'], true)) {
        abort(403, 'Unauthorized');
    }

    $folder = $role === 'Administrator' ? 'admin' : 'resepsionis';

    $pemilik = Pemilik::join('user', 'pemilik.iduser', '=', 'user.iduser')
        ->select('pemilik.idpemilik', 'user.nama')
        ->get();

    $ras = RasHewan::all();

    return view("$folder.pet.create", compact('pemilik', 'ras', 'folder'));
}


  public function store(Request $request)
{
    // Cek role
    $role = auth()->user()->role_name;
    if (!in_array($role, ['Administrator', 'Resepsionis'], true)) {
        abort(403, 'Unauthorized');
    }

    // Validasi
    $this->validateData($request);

    // Simpan data pet (AMAN, sesuai tabel)
    Pet::create([
        'nama'          => $request->nama,
        'tanggal_lahir' => $request->tanggal_lahir,
        'warna_tanda'   => $request->warna_tanda,
        'jenis_kelamin' => $request->jenis_kelamin,
        'idpemilik'     => $request->idpemilik,
        'idras_hewan'   => $request->idras_hewan,
    ]);

    // Redirect ke INDEX (BUKAN balik ke form)
    $folder = $this->mapViewFolder($role);

    return redirect()
        ->route("$folder.pet.index")
        ->with('success', 'Data Pet berhasil ditambahkan!');
}


    public function edit($id)
    {
        $role = auth()->user()->role_name;
        if (!in_array($role, ['Administrator', 'Resepsionis'], true)) {
            abort(403, 'Unauthorized');
        }

        $folder = $this->mapViewFolder($role);
        if (!$folder) abort(403, 'Unauthorized');

        $pet = Pet::findOrFail($id);
        $pemilik = Pemilik::join('user', 'pemilik.iduser', '=', 'user.iduser')
        ->select('pemilik.idpemilik', 'user.nama')
        ->get();

        $ras = RasHewan::all();

        return view("$folder.pet.edit", compact('pet', 'pemilik', 'ras'));
    }

    public function update(Request $request, $id)
    {
        $role = auth()->user()->role_name;
        if (!in_array($role, ['Administrator', 'Resepsionis'], true)) {
            abort(403, 'Unauthorized');
        }

        $this->validateData($request);

        Pet::where('idpet', $id)->update($request->except(['_token', '_method']));

        return redirect()->back()->with('success', 'Data Pet berhasil diupdate!');
    }

    public function destroy($id)
    {
        $role = auth()->user()->role_name;
        if (!in_array($role, ['Administrator', 'Resepsionis'], true)) {
            abort(403, 'Unauthorized');
        }

        Pet::destroy($id);

        return redirect()->back()->with('success', 'Data Pet berhasil dihapus!');
    }

    private function validateData(Request $request)
    {
        return $request->validate([
            'nama'          => 'required|max:100',
            'tanggal_lahir' => 'required|date',
            'warna_tanda'   => 'nullable|max:45',
            'jenis_kelamin' => 'required|in:L,P',
            'idpemilik'     => 'required|integer',
            'idras_hewan'   => 'required|integer',
        ]);
    }
}
