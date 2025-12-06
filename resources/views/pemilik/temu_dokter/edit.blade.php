@extends('layouts.lte.main')

@section('content')

<h2 class="text-2xl mb-4 font-semibold text-blue-800">Edit Reservasi Dokter</h2>

<div class="card p-4">

<form action="{{ route('pemilik.temu-dokter.update', $data->idreservasi_dokter) }}" method="POST">
    @csrf @method('PUT')

    <div class="form-group">
        <label>No Urut</label>
        <input type="number" name="no_urut" class="form-control" value="{{ $data->no_urut }}">
    </div>

    <div class="form-group mt-3">
        <label>Pilih Pet</label>
        <select name="idpet" class="form-control">
            @foreach($pet as $p)
                <option value="{{ $p->idpet }}" {{ $p->idpet == $data->idpet ? 'selected':'' }}>
                    {{ $p->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-3">
        <label>Pilih Dokter</label>
        <select name="idrole_user" class="form-control">
            @foreach($dokter as $d)
                <option value="{{ $d->idrole_user }}" 
                    {{ $d->idrole_user == $data->idrole_user ? 'selected':'' }}>
                    {{ $d->user->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary mt-3">Update</button>

</form>

</div>

@endsection
