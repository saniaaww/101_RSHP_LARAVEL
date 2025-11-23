<?php

namespace App\Http\Controllers;

use App\Models\TemuDokter;
use App\Models\Pet;
use App\Models\RoleUser;
use Illuminate\Http\Request;

class TemuDokterController extends Controller
{
    public function index()
    {
        $data = TemuDokter::with(['pet','dokter'])->get();
        return view('admin.temu_dokter.index', compact('data'));
    }

    public function create()
    {
        $pet = Pet::all();
        $dokter = RoleUser::where('idrole',2)->get(); // role dokter

        return view('admin.temu_dokter.create', compact('pet','dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_urut' => 'required',
            'idpet' => 'required',
            'idrole_user' => 'required'
        ]);

        TemuDokter::create($request->all());

        return redirect()->route('admin.temu-dokter.index')
            ->with('success','Reservasi dokter ditambahkan');
    }

    public function edit($id)
    {
        $data = TemuDokter::findOrFail($id);
        $pet = Pet::all();
        $dokter = RoleUser::where('idrole',2)->get();

        return view('admin.temu_dokter.edit', compact('data','pet','dokter'));
    }

    public function update(Request $request, $id)
    {
        TemuDokter::find($id)->update($request->all());

        return redirect()->route('admin.temu-dokter.index')
            ->with('success','Reservasi dokter diperbarui');
    }

    public function destroy($id)
    {
        TemuDokter::find($id)->delete();

        return redirect()->route('admin.temu-dokter.index')
            ->with('success','Reservasi dihapus');
    }
}
