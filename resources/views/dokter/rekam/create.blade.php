@extends('dokter.layout')
@section('title','Buat Rekam Medis')
@section('content')

<form method="POST" action="{{ route('dokter.rekam.store') }}">
    @csrf
    <div class="mb-3">
        <label>Pasien</label>
        <select name="idpet" class="border p-2 w-full">
            @foreach($pets as $p)
                <option value="{{ $p->idpet }}" {{ (isset($pet_selected) && $pet_selected==$p->idpet)?'selected':'' }}>{{ $p->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Anamnesa</label>
        <textarea name="anamnesa" class="border p-2 w-full" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label>Temuan Klinis</label>
        <textarea name="temuan_klinis" class="border p-2 w-full" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label>Diagnosa</label>
        <textarea name="diagnosa" class="border p-2 w-full" rows="2"></textarea>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>

@endsection
