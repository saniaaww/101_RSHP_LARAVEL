@extends('layouts.app')

@section('content')

<h2 class="text-2xl mb-4 font-semibold text-blue-800">
    Tambah Reservasi Dokter
</h2>

<div class="card p-4">

<form action="{{ route('resepsionis.temu-dokter.store') }}" method="POST">
    @csrf

    {{-- Pet --}}
    <div class="form-group mt-3">
        <label>Pilih Pet</label>
        <select name="idpet" class="form-control" required>
            <option value="">-- Pilih Pet --</option>
            @foreach($pet as $p)
                <option value="{{ $p->idpet }}">
                    {{ $p->nama }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Dokter --}}
    <div class="form-group mt-3">
        <label>Pilih Dokter</label>
        <select name="idrole_user" class="form-control" required>
            <option value="">-- Pilih Dokter --</option>
            @foreach($dokter as $d)
                <option value="{{ $d->idrole_user }}">
                    {{ $d->user->nama }}
                </option>
            @endforeach
        </select>
    </div>

      {{-- Status --}}
    <div class="form-group mt-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="B">Belum</option>
            <option value="S">Selesai</option>
        </select>
    </div>

    <div class="mt-4">
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('resepsionis.temu-dokter.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

</form>

</div>

@endsection
