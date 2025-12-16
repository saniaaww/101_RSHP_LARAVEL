@extends('layouts.app')

@section('content')

<h2 class="text-2xl mb-4 font-semibold">Edit Profil Pemilik</h2>

<div class="card p-4">

    <form action="{{ route('pemilik.profil.update') }}" method="POST">
        @csrf
    
        <div class="mb-3">
            <label class="form-label">No WA</label>
            <input type="text" name="no_wa" class="form-control"
                   value="{{ old('no_wa', $pemilik->no_wa) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control"
                   value="{{ old('alamat', $pemilik->alamat) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('pemilik.profil.index') }}" class="btn btn-secondary">Batal</a>

    </form>

</div>

@endsection
