@extends('layouts.lte.main')

@section('content')

<h2 class="mb-4 text-2xl font-semibold text-blue-800">Edit Rekam Medis</h2>

<div class="card p-4">

<form action="{{ route('admin.rekam-medis.update', $data->idrekam_medis) }}" method="POST">
    @csrf @method('PUT')

    <div class="form-group">
        <label>Pet</label>
        <select name="idpet" class="form-control">
            @foreach($pet as $p)
                <option value="{{ $p->idpet }}" 
                    {{ $data->idpet == $p->idpet ? 'selected':'' }}>
                    {{ $p->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-3">
        <label>Anamnesa</label>
        <textarea name="anamnesa" class="form-control">{{ $data->anamnesa }}</textarea>
    </div>

    <div class="form-group mt-3">
        <label>Temuan Klinis</label>
        <textarea name="temuan_klinis" class="form-control">{{ $data->temuan_klinis }}</textarea>
    </div>

    <div class="form-group mt-3">
        <label>Diagnosa</label>
        <textarea name="diagnosa" class="form-control">{{ $data->diagnosa }}</textarea>
    </div>

    <button class="btn btn-primary mt-3">Update</button>

</form>

</div>

@endsection
