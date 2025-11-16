<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pet = Pet::with(['ras', 'pemilik'])->get();
        return view('admin.pet.index', compact('pet'));
    }

    public function create()
    {
        $pemilik = Pemilik::all();
        $ras = RasHewan::all();
        return view('admin.pet.create', compact('pemilik', 'ras'));
    }

    public function store(Request $request)
    {
        $this->validatePet($request);

        $this->createPet($request);

        return redirect()->route('admin.pet.index')->with('success', 'Data Pet berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        $pemilik = Pemilik::all();
        $ras = RasHewan::all();

        return view('admin.pet.edit', compact('pet', 'pemilik', 'ras'));
    }

    public function update(Request $request, $id)
    {
        $this->validatePet($request);

        $this->updatePet($request, $id);

        return redirect()->route('admin.pet.index')->with('success', 'Data Pet berhasil diupdate');
    }

    public function destroy($id)
    {
        Pet::destroy($id);

        return redirect()->route('admin.pet.index')->with('success', 'Data Pet berhasil dihapus');
    }

    /*=====================================
        VALIDATION
    =====================================*/
    private function validatePet(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'nullable|string|max:45',
            'jenis_kelamin' => 'required|in:L,P',
            'idpemilik' => 'required|integer',
            'idras_hewan' => 'required|integer'
        ]);
    }

    /*=====================================
        HELPER CREATE
    =====================================*/
    private function createPet(Request $request)
    {
        Pet::create([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna_tanda' => $request->warna_tanda,
            'jenis_kelamin' => $request->jenis_kelamin,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan
        ]);
    }

    /*=====================================
        HELPER UPDATE
    =====================================*/
    private function updatePet(Request $request, $id)
    {
        Pet::where('idpet', $id)->update([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna_tanda' => $request->warna_tanda,
            'jenis_kelamin' => $request->jenis_kelamin,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan
        ]);
    }
}
