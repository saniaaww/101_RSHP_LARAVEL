@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Profil Dokter</h5>
        </div>

        <div class="card-body">
            <div class="row">

                {{-- Nama & Email (diambil dari tabel users) --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Nama Dokter</label>
                    <input type="text" class="form-control" value="{{ $dokter->user->name ?? '-' }}" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="text" class="form-control" value="{{ $dokter->user->email ?? '-' }}" readonly>
                </div>

                {{-- Alamat --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Alamat</label>
                    <input type="text" class="form-control" value="{{ $dokter->alamat }}" readonly>
                </div>

                {{-- Nomor HP --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Nomor HP</label>
                    <input type="text" class="form-control" value="{{ $dokter->no_hp }}" readonly>
                </div>

                {{-- Bidang Dokter --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Bidang Dokter</label>
                    <input type="text" class="form-control" value="{{ $dokter->bidang_dokter }}" readonly>
                </div>

                {{-- Jenis Kelamin --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Jenis Kelamin</label>
                    <input type="text" class="form-control"
                           value="{{ $dokter->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}" readonly>
                </div>

            </div>

            <div class="mt-3">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
