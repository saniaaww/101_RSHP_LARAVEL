@extends('dokter.layout')
@section('title','Detail Rekam Medis')
@section('content')

<h2 class="text-xl font-semibold mb-2">Rekam #{{ $rekam->idrekam_medis }} — {{ $rekam->pet->nama ?? '-' }}</h2>
<p class="text-sm text-gray-600 mb-3">Tanggal: {{ $rekam->created_at }}</p>

<div class="bg-white p-4 rounded shadow mb-4">
    <h3 class="font-semibold">Anamnesa</h3>
    <p>{{ $rekam->anamnesa }}</p>

    <h3 class="font-semibold mt-3">Temuan Klinis</h3>
    <p>{{ $rekam->temuan_klinis }}</p>

    <h3 class="font-semibold mt-3">Diagnosa</h3>
    <p>{{ $rekam->diagnosa }}</p>
</div>

<hr class="my-4">

<h3 class="font-semibold mb-2">Detail Rekam Medis</h3>

<!-- Form tambah detail -->
<form method="POST" action="{{ route('dokter.rekam.detail.store', $rekam->idrekam_medis) }}" class="mb-4">
    @csrf
    <div class="flex gap-2">
        <select name="idkode_tindakan_terapi" class="border p-2">
            @foreach(\App\Models\KodeTindakanTerapi::orderBy('kode')->get() as $k)
                <option value="{{ $k->idkode_tindakan_terapi }}">{{ $k->kode }} — {{ \Illuminate\Support\Str::limit($k->deskripsi_tindakan_terapi,40) }}</option>
            @endforeach
        </select>
        <input name="detail" placeholder="Catatan / detail" class="border p-2 flex-1">
        <button class="bg-green-600 text-white px-3 py-2 rounded">Tambah</button>
    </div>
</form>

<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-100">
        <tr><th class="p-2">Tindakan</th><th class="p-2">Detail</th><th class="p-2">Aksi</th></tr>
    </thead>
    <tbody>
    @foreach($rekam->details as $d)
        <tr class="border-b">
            <td class="p-2">{{ $d->kodeTindakan->kode ?? '' }} — {{ \Illuminate\Support\Str::limit($d->kodeTindakan->deskripsi_tindakan_terapi ?? '', 80) }}</td>
            <td class="p-2">{{ $d->detail }}</td>
            <td class="p-2">
                <a class="text-blue-600 mr-2" href="{{ route('dokter.rekam.detail.edit', [$rekam->idrekam_medis, $d->iddetail_rekam_medis]) }}">Edit</a>
                <form method="POST" action="{{ route('dokter.rekam.detail.destroy', $d->iddetail_rekam_medis) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="text-red-600" onclick="return confirm('Hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
