@extends('layouts.lte.main')

@section('title', 'Dashboard Pemilik')

@section('content')

<!-- Logout button -->
<div class="row mb-4">
    <div class="col text-right">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                Logout
            </button>
        </form>
    </div>
</div>

<!-- Header -->
<h2 class="text-center font-weight-bold mb-4" style="font-size:28px; color:#1B3C73;">
    Menu Pemilik
</h2>

<!-- Card Gradient Styles -->
<style>
    .grad-card {
        border-radius: 18px;
        padding: 0;
        transition: 0.3s;
        box-shadow: 0 6px 18px rgba(0,0,0,0.12);
        border: none;
        overflow: hidden;
    }
    .grad-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.18);
    }
    .grad-icon {
        width: 60px; height: 60px; border-radius: 14px;
        font-size: 26px; display: flex; align-items: center; justify-content: center;
        color: white;
    }
    .gradient-blue { background: linear-gradient(135deg, #4A90E2, #6EC6FF); }
    .gradient-green { background: linear-gradient(135deg, #4CAF50, #81C784); }
    .gradient-purple { background: linear-gradient(135deg, #8E24AA, #BA68C8); }
    .gradient-red { background: linear-gradient(135deg, #E53935, #EF5350); }
</style>

<!-- Cards Grid -->
<div class="row">

    {{-- Temu Dokter --}}
    <div class="col-md-4 col-sm-6 mb-4">
        <a href="{{ route('pemilik.temu-dokter.index') }}" class="text-dark">
            <div class="card grad-card gradient-purple text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="grad-icon mr-3 gradient-purple">📅</div>
                    <div>
                        <h5 class="font-weight-bold">Jadwal Temu Dokter</h5>
                        <p class="mb-0">Lihat reservasi dokter</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

        {{-- Rekam Medis --}}
    <div class="col-md-4 col-sm-6 mb-4">
        <a href="{{ route('pemilik.rekam.index') }}" class="text-dark">
            <div class="card grad-card gradient-red text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="grad-icon mr-3 gradient-red">📋</div>
                    <div>
                        <h5 class="font-weight-bold">Rekam Medis</h5>
                        <p class="mb-0">Riwayat kesehatan hewan</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    {{-- Profil --}}
    <div class="col-md-4 col-sm-6 mb-4">
        <a href="{{ route('pemilik.profil.index') }}" class="text-dark">
            <div class="card grad-card gradient-blue text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="grad-icon mr-3 gradient-blue">👤</div>
                    <div>
                        <h5 class="font-weight-bold">Profil</h5>
                        <p class="mb-0">Lihat profil Anda</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    {{-- Hewan Peliharaan --}}
    <div class="col-md-4 col-sm-6 mb-4">
        <a href="{{ route('pemilik.pet.index') }}" class="text-dark">
            <div class="card grad-card gradient-green text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="grad-icon mr-3 gradient-green">🐶</div>
                    <div>
                        <h5 class="font-weight-bold">Hewan Peliharaan</h5>
                        <p class="mb-0">Lihat daftar hewan Anda</p>
                    </div>
                </div>
            </div>
        </a>
    </div>


</div>
@endsection
