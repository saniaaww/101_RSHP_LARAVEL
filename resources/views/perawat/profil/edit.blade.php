@extends('layouts.app')

@section('content')

<h2 class="text-2xl mb-4 font-semibold">Edit Profil Perawat</h2>

<div class="card p-4">

    <form action="{{ route('perawat.profil.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control"
                   value="{{ old('alamat', $perawat->alamat) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control"
                   value="{{ old('no_hp', $perawat->no_hp) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $perawat->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $perawat->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Pendidikan</label>
            <input type="text" name="pendidikan" class="form-control"
                   value="{{ old('pendidikan', $perawat->pendidikan) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('perawat.profil.index') }}" class="btn btn-secondary">Batal</a>

    </form>

</div>

@endsection
