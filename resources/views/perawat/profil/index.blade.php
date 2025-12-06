@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Profil Perawat</h3>

    <div class="card">
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-4 text-muted">ID Perawat</div>
                <div class="col-md-8">{{ $perawat->idperawat }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 text-muted">Alamat</div>
                <div class="col-md-8">{{ $perawat->alamat }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 text-muted">No. HP</div>
                <div class="col-md-8">{{ $perawat->no_hp }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 text-muted">Jenis Kelamin</div>
                <div class="col-md-8">
                    @if($perawat->jenis_kelamin == 'L')
                        Laki-laki
                    @else
                        Perempuan
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 text-muted">Pendidikan</div>
                <div class="col-md-8">{{ $perawat->pendidikan }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 text-muted">User Login</div>
                <div class="col-md-8">{{ $perawat->user->name ?? '-' }}</div>
            </div>

            <a href="{{ route('perawat.dashboard') }}" class="btn btn-secondary mt-3">Kembali</a>

        </div>
    </div>
</div>
@endsection
