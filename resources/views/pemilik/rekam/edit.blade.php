@extends('layouts.lte.main')

@section('content')

<h2 class="mb-4 text-2xl font-semibold text-blue-800">Edit Rekam Medis</h2>

<div class="card p-4">

<form action="{{ route('pemilik.rekam.update', $rekamMedis->idrekam_medis) }}" method="POST">
    @csrf @method('PUT')

    <div class="form-group mt-3">
        <label>Anamnesa</label>
        <textarea name="anamnesa" class="form-control">{{ old('anamnesa', $rekamMedis->anamnesa) }}</textarea>
    </div>

    <div class="form-group mt-3">
        <label>Temuan Klinis</label>
        <textarea name="temuan_klinis" class="form-control">{{ old('temuan_klinis', $rekamMedis->temuan_klinis) }}</textarea>
    </div>

    <div class="form-group mt-3">
        <label>Diagnosa</label>
        <textarea name="diagnosa" class="form-control">{{ old('diagnosa', $rekamMedis->diagnosa) }}</textarea>
    </div>

    <div class="form-group mt-3">
        <label>Dokter Pemeriksa</label>
        <input type="number" name="dokter_pemeriksa" class="form-control" 
               value="{{ old('dokter_pemeriksa', $rekamMedis->dokter_pemeriksa) }}">
    </div>

    <div class="form-group mt-3">
        <label>ID Reservasi Dokter</label>
        <input type="number" name="idreservasi_dokter" class="form-control" 
               value="{{ old('idreservasi_dokter', $rekamMedis->idreservasi_dokter) }}">
    </div>

    <button class="btn btn-primary mt-3">Update</button>

</form>

</div>
@endsection
