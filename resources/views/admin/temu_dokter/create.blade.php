@extends('layouts.lte.main')

@section('content')

<h2 class="text-2xl mb-4 font-semibold text-blue-800">Tambah Reservasi Dokter</h2>

<div class="card p-4">

<form action="{{ route('admin.temu-dokter.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>No Urut</label>
        <input type="number" name="no_urut" class="form-control" required>
    </div>

    <div class="form-group mt-3">
        <label>Pilih Pet</label>
        <select name="idpet" class="form-control" required>
            @foreach($pet as $p)
                <option value="{{ $p->idpet }}">{{ $p->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-3">
        <label>Pilih Dokter</label>
        <select name="idrole_user" class="form-control" required>
            @foreach($dokter as $d)
                <option value="{{ $d->idrole_user }}">{{ $d->user->nama }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success mt-3">Simpan</button>

</form>

</div>

@endsection
