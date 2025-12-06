@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Detail Rekam Medis</h3>

    <form action="{{ route('dokter.detail.update', $detail->iddetail_rekam_medis) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Rekam Medis</label>
            <select name="idrekam_medis" class="form-control">
                @foreach($rekamMedis as $r)
                <option value="{{ $r->idrekam_medis }}"
                    {{ $detail->idrekam_medis == $r->idrekam_medis ? 'selected' : '' }}>
                    {{ $r->diagnosa }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tindakan Terapi</label>
            <select name="idkode_tindakan_terapi" class="form-control">
                @foreach($tindakan as $t)
                <option value="{{ $t->idkode_tindakan_terapi }}"
                    {{ $detail->idkode_tindakan_terapi == $t->idkode_tindakan_terapi ? 'selected' : '' }}>
                    {{ $t->deskripsi_tindakan_terapi }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Detail</label>
            <input type="text" name="detail" class="form-control" value="{{ $detail->detail }}">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('dokter.detail.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
