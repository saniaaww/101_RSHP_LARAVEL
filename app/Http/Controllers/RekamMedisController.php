<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pet;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $data = RekamMedis::with('pet')->get();
        return view('admin.rekam-medis.index', compact('data'));
    }

    public function create()
    {
        $pet = Pet::all();
        return view('admin.rekam-medis.create', compact('pet'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anamnesa' => 'required',
            'temuan_klinis' => 'required',
            'diagnosa' => 'required',
            'idpet' => 'required'
        ]);

        RekamMedis::create($request->all());

        return redirect()->route('admin.rekam-medis.index')
            ->with('success', 'Rekam medis berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = RekamMedis::findOrFail($id);
        $pet = Pet::all();

        return view('admin.rekam-medis.edit', compact('data', 'pet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'anamnesa' => 'required',
            'temuan_klinis' => 'required',
            'diagnosa' => 'required',
            'idpet' => 'required'
        ]);

        RekamMedis::find($id)->update($request->all());

        return redirect()->route('admin.rekam-medis.index')
            ->with('success', 'Rekam medis berhasil diupdate');
    }

    public function destroy($id)
    {
        RekamMedis::find($id)->delete();

        return redirect()->route('admin.rekam-medis.index')
            ->with('success', 'Rekam medis berhasil dihapus');
    }
}
