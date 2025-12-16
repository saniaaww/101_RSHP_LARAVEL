@extends('layouts.lte.main')

@section('content')

<h2 class="mb-4 text-2xl font-semibold text-blue-800">Edit Rekam Medis</h2>

<div class="card p-4">

<form action="{{ route('admin.rekam-medis.update', $rekamMedis->idrekam_medis) }}" method="POST">
    @csrf
    @method('PUT')

       <div class="mb-3">
    <label class="form-label">Dokter Pemeriksa</label>
    <select name="dokter_pemeriksa" class="form-control" required>
        <option value="">-- Pilih Dokter --</option>
        @foreach($dokters as $d)
            <option value="{{ $d->iddokter }}">
                {{ $d->user->nama }} - {{ $d->bidang_dokter }}
            </option>
        @endforeach
    </select>
    </div>

    <div class="mb-3">
    <label class="form-label">Reservasi Dokter</label>
    <select name="idreservasi_dokter" class="form-control" required>
        <option value="">-- Pilih Reservasi --</option>
        @foreach($reservasis as $r)
            <option value="{{ $r->idreservasi_dokter }}">
                {{ $r->pet->nama ?? '-' }} | No Urut {{ $r->no_urut }}
            </option>
        @endforeach
    </select>
</div>

    <div class="form-group mt-3">
        <label>Anamnesa</label>
        <textarea name="anamnesa" class="form-control" required>
            {{ old('anamnesa', $rekamMedis->anamnesa) }}
        </textarea>
    </div>

    <div class="form-group mt-3">
        <label>Temuan Klinis</label>
        <textarea name="temuan_klinis" class="form-control" required>
            {{ old('temuan_klinis', $rekamMedis->temuan_klinis) }}
        </textarea>
    </div>

    <div class="form-group mt-3">
        <label>Diagnosa</label>
        <textarea name="diagnosa" class="form-control" required>
            {{ old('diagnosa', $rekamMedis->diagnosa) }}
        </textarea>
    </div>

    <button class="btn btn-primary mt-3">Update</button>

</form>

</div>

@endsection
