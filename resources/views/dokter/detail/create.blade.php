@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah Detail Rekam Medis</h3>

    <form action="{{ route('dokter.detail.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Rekam Medis</label>
            <select name="idrekam_medis" class="form-control" required>
                <option value="">-- Pilih Rekam Medis --</option>
                @foreach($rekamMedis as $r)
                <option value="{{ $r->idrekam_medis }}">
                    {{ $r->diagnosa }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tindakan Terapi</label>
            <select name="idkode_tindakan_terapi" class="form-control" required>
                <option value="">-- Pilih Tindakan --</option>
                @foreach($tindakan as $t)
                <option value="{{ $t->idkode_tindakan_terapi }}">
                   {{ $t->deskripsi_tindakan_terapi }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Detail</label>
            <input type="text" name="detail" class="form-control" maxlength="1000">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('dokter.detail.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
