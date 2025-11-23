@extends('layouts.lte.main')

@section('content')

<h2 class="mb-4 text-2xl font-semibold text-blue-800">Edit Detail Rekam Medis</h2>

<div class="card p-4">

<form action="{{ route('admin.detail-rekam.update', $data->iddetail_rekam_medis) }}" method="POST">
    @csrf @method('PUT')

    <div class="form-group">
        <label>Rekam Medis</label>
        <select name="idrekam_medis" class="form-control">
            @foreach($rekam as $r)
                <option value="{{ $r->idrekam_medis }}"
                    {{ $data->idrekam_medis == $r->idrekam_medis ? 'selected':'' }}>
                    RM{{ $r->idrekam_medis }} - {{ $r->pet->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-3">
        <label>Kode Tindakan</label>
        <select name="idkode_tindakan_terapi" class="form-control">
            @foreach($tindakan as $t)
                <option value="{{ $t->idkode_tindakan_terapi }}"
                    {{ $data->idkode_tindakan_terapi == $t->idkode_tindakan_terapi ? 'selected':'' }}>
                    {{ $t->kode }} - {{ $t->deskripsi_tindakan_terapi }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mt-3">
        <label>Detail</label>
        <textarea name="detail" class="form-control">{{ $data->detail }}</textarea>
    </div>

    <button class="btn btn-primary mt-3">Update</button>

</form>

</div>

@endsection
