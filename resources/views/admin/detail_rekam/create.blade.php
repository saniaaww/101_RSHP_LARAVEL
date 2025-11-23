@extends('layouts.lte.main')

@section('content')

<h2 class="mb-4 text-2xl font-semibold text-blue-800">Tambah Detail Rekam Medis</h2>

<div class="card p-4">

<form action="{{ route('admin.detail-rekam.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Rekam Medis</label>
        <select name="idrekam_medis" class="form-control">
            @foreach($rekam as $r)
                <option value="{{ $r->idrekam_medis }}">
                    RM{{ $r->idrekam_medis }} - {{ $r->pet->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-3">
        <label>Kode Tindakan</label>
        <select name="idkode_tindakan_terapi" class="form-control">
            @foreach($tindakan as $t)
                <option value="{{ $t->idkode_tindakan_terapi }}">
                    {{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-3">
        <label>Detail</label>
        <textarea name="detail" class="form-control"></textarea>
    </div>

    <button class="btn btn-success mt-3">Simpan</button>

</form>

</div>

@endsection
