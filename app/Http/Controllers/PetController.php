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

        $folder = $this->mapViewFolder($role);
        if (!$folder) abort(403, 'Unauthorized');

        $pemilik = Pemilik::all();
        $ras = RasHewan::all();

        return view("$folder.pet.create", compact('pemilik', 'ras'));
    }

    public function store(Request $request)
    {
        $role = auth()->user()->role_name;
        if (!in_array($role, ['Administrator', 'Resepsionis'], true)) {
            abort(403, 'Unauthorized');
        }

        $this->validateData($request);

        Pet::create($request->all());

        return redirect()->back()->with('success', 'Data Pet berhasil ditambahkan!');
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
        $pemilik = Pemilik::all();
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
