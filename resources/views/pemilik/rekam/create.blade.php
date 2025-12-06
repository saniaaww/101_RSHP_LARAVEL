@extends('layouts.lte.main')

@section('content')

<h2 class="mb-4 text-2xl font-semibold text-blue-800">Tambah Rekam Medis</h2>

<div class="card p-4">

<form action="{{ route('pemilik.rekam.store') }}" method="POST">
    @csrf

    <div class="form-group mt-3">
        <label>Anamnesa</label>
        <textarea name="anamnesa" class="form-control" required></textarea>
    </div>

    <div class="form-group mt-3">
        <label>Temuan Klinis</label>
        <textarea name="temuan_klinis" class="form-control" required></textarea>
    </div>

    <div class="form-group mt-3">
        <label>Diagnosa</label>
        <textarea name="diagnosa" class="form-control" required></textarea>
    </div>

    <div class="form-group mt-3">
        <label>Dokter Pemeriksa</label>
        <input type="number" name="dokter_pemeriksa" class="form-control" required>
    </div>

    <div class="form-group mt-3">
        <label>ID Reservasi Dokter</label>
        <input type="number" name="idreservasi_dokter" class="form-control" required>
    </div>

    <button class="btn btn-success mt-3">Simpan</button>

</form>

</div>

@endsection
