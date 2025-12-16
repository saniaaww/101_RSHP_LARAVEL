@extends('layouts.lte.main')

@section('content')
<div class="container mt-4">
    <h3>Tambah Detail Rekam Medis</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.detail.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Rekam Medis</label>
            <select name="idrekam_medis" class="form-control" required>
                <option value="">-- Pilih Rekam Medis --</option>
                @foreach($rekamMedis as $r)
                <option value="{{ $r->idrekam_medis }}">
                    {{ $r->diagnosa ?? ('#' . $r->idrekam_medis) }}
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
                    {{ $t->deskripsi_tindakan_terapi ?? $t->kode }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Detail</label>
            <input type="text" name="detail" class="form-control" maxlength="1000" value="{{ old('detail') }}">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.detail.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
