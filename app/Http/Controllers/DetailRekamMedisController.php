<?php

namespace App\Http\Controllers;

use App\Models\DetailRekamMedis;
use App\Models\KodeTindakanTerapi;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class DetailRekamMedisController extends Controller
{
    /**
     * Map role name (DB) → folder view + route prefix
     * Administrator → admin
     * Dokter → dokter
     */
    private function getFolder(): string
    {
        $role = auth()->user()->role_name;

        return $role === 'Administrator'
            ? 'admin'
            : strtolower($role);
    }

    /**
     * Get route name for redirect
     */
    private function getRedirectRoute(): string
    {
        $folder = $this->getFolder(); // admin / dokter
        return $folder . '.detail.index';
    }

    public function index()
    {
        $folder = $this->getFolder();
        $details = DetailRekamMedis::with(['rekamMedis', 'kodeTindakan'])->get();

        return view("$folder.detail.index", compact('details'));
    }

    public function create()
    {
        $folder = $this->getFolder();

        return view("$folder.detail.create", [
            'rekamMedis' => RekamMedis::all(),
            'tindakan'   => KodeTindakanTerapi::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        DetailRekamMedis::create($data);

        return redirect()->route($this->getRedirectRoute())
            ->with('success', 'Detail rekam medis berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $folder = $this->getFolder();

        return view("$folder.detail.edit", [
            'detail'     => DetailRekamMedis::findOrFail($id),
            'rekamMedis' => RekamMedis::all(),
            'tindakan'   => KodeTindakanTerapi::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $this->validateData($request);

        $detail = DetailRekamMedis::findOrFail($id);
        $detail->update($data);

        return redirect()->route($this->getRedirectRoute())
            ->with('success', 'Detail rekam medis berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DetailRekamMedis::destroy($id);

        return redirect()->route($this->getRedirectRoute())
            ->with('success', 'Detail rekam medis berhasil dihapus!');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'idrekam_medis'          => 'required|exists:rekam_medis,idrekam_medis',
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail'                 => 'nullable|string|max:1000',
        ]);
    }
}
