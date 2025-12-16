@extends('layouts.app')

@section('content')

<h2 class="text-2xl mb-4 font-semibold">Edit Profil Dokter</h2>

<div class="card p-4">
    <form action="{{ route('dokter.profil.update') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control"
                   value="{{ old('alamat', $dokter->alamat) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control"
                   value="{{ old('no_hp', $dokter->no_hp) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Bidang Dokter</label>
            <input type="text" name="bidang_dokter" class="form-control"
                   value="{{ old('bidang_dokter', $dokter->bidang_dokter) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $dokter->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $dokter->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <button class="btn btn-success" type="submit">Simpan Perubahan</button>
        <a href="{{ route('dokter.profil.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@endsection
