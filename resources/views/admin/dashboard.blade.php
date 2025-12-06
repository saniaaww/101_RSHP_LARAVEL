@extends('layouts.lte.main')

@section('title', 'Dashboard')

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
    Data Master
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
        width: 60px; 
        height: 60px; 
        border-radius: 14px;
        font-size: 26px;
        display: flex; 
        align-items: center; 
        justify-content: center;
        color: white;
    }

    .gradient-blue { background: linear-gradient(135deg, #4A90E2, #6EC6FF); }
    .gradient-green { background: linear-gradient(135deg, #4CAF50, #81C784); }
    .gradient-orange { background: linear-gradient(135deg, #FF9800, #FFB74D); }
    .gradient-purple { background: linear-gradient(135deg, #8E24AA, #BA68C8); }
    .gradient-cyan { background: linear-gradient(135deg, #00ACC1, #4DD0E1); }
    .gradient-indigo { background: linear-gradient(135deg, #3F51B5, #7986CB); }
    .gradient-red { background: linear-gradient(135deg, #E53935, #EF5350); }
    .gradient-lime { background: linear-gradient(135deg, #7CB342, #AED581); }
</style>

<!-- Cards Grid -->
<div class="row">

    <!-- Jenis Hewan -->
    <div class="col-md-4 col-sm-6 mb-4">
        <a href="{{ route('admin.jenis.index') }}" class="text-dark">
            <div class="card grad-card gradient-blue text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="grad-icon mr-3 gradient-blue">🐶</div>
                    <div>
                        <h5 class="font-weight-bold">Jenis Hewan</h5>
                        <p class="mb-0">Kelola jenis hewan</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Ras Hewan -->
    <div class="col-md-4 col-sm-6 mb-4">
        <a href="{{ route('admin.ras.index') }}" class="text-dark">
            <div class="card grad-card gradient-green text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="grad-icon mr-3 gradient-green">🐾</div>
                    <div>
                        <h5 class="font-weight-bold">Ras Hewan</h5>
                        <p class="mb-0">Daftar ras dan hubungannya</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Kategori -->
    <div class="col-md-4 col-sm-6 mb-4">
        <a href="{{ route('admin.kategori.index') }}" class="text-dark">
            <div class="card grad-card gradient-orange text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="grad-icon mr-3 gradient-orange">🗂️</div>
                    <div>
                        <h5 class="font-weight-bold">Kategori</h5>
                        <p class="mb-0">Kategori layanan</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Kategori Klinis -->
    <div class="col-md-4 col-sm-6 mb-4">
        <a href="{{ route('admin.kategori-klinis.index') }}" class="text-dark">
            <div class="card grad-card gradient-purple text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="grad-icon mr-3 gradient-purple">💊</div>
                    <div>
                        <h5 class="font-weight-bold">Kategori Klinis</h5>
                        <p class="mb-0">Terapi vs Tindakan</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Kode Tindakan -->
    <div class="col-md-4 col-sm-6 mb-4">
        <a href="{{ route('admin.kode-tindakan.index') }}" class="text-dark">
            <div class="card grad-card gradient-cyan text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="grad-icon mr-3 gradient-cyan">⚕️</div>
                    <div>
                        <h5 class="font-weight-bold">Kode Tindakan</h5>
                        <p class="mb-0">Daftar kode & deskripsi tindakan</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Pet -->
    <div class="col-md-4 col-sm-6 mb-4">
        <a href="{{ route('admin.pet.index') }}" class="text-dark">
            <div class="card grad-card gradient-indigo text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="grad-icon mr-3 gradient-indigo">🐕</div>
                    <div>
                        <h5 class="font-weight-bold">Daftar Pet</h5>
                        <p class="mb-0">Data hewan peliharaan</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Role -->
    <div class="col-md-4 col-sm-6 mb-4">
        <a href="{{ route('admin.role.index') }}" class="text-dark">
            <div class="card grad-card gradient-red text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="grad-icon mr-3 gradient-red">🧩</div>
                    <div>
                        <h5 class="font-weight-bold">Daftar Role</h5>
                        <p class="mb-0">Kelola peran user</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- User -->
    <div class="col-md-4 col-sm-6 mb-4">
        <a href="{{ route('admin.user.index') }}" class="text-dark">
            <div class="card grad-card gradient-lime text-white">
                <div class="card-body d-flex align-items-center">
                    <div class="grad-icon mr-3 gradient-lime">👥</div>
                    <div>
                        <h5 class="font-weight-bold">Daftar User</h5>
                        <p class="mb-0">User beserta rolenya</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Rekam Medis -->
<div class="col-md-4 col-sm-6 mb-4">
    <a href="{{ route('admin.rekam-medis.index') }}" class="text-dark">
        <div class="card grad-card gradient-orange text-white">
            <div class="card-body d-flex align-items-center">
                <div class="grad-icon mr-3 gradient-orange">📋</div>
                <div>
                    <h5 class="font-weight-bold">Rekam Medis</h5>
                    <p class="mb-0">Kelola data rekam medis</p>
                </div>
            </div>
        </div>
    </a>
</div>

<!-- Detail Rekam Medis -->
<div class="col-md-4 col-sm-6 mb-4">
    <a href="{{ route('admin.detail.index') }}" class="text-dark">
        <div class="card grad-card gradient-cyan text-white">
            <div class="card-body d-flex align-items-center">
                <div class="grad-icon mr-3 gradient-cyan">📝</div>
                <div>
                    <h5 class="font-weight-bold">Detail Rekam Medis</h5>
                    <p class="mb-0">Kelola detail tindakan medis</p>
                </div>
            </div>
        </div>
    </a>
</div>

<!-- Temu Dokter -->
<div class="col-md-4 col-sm-6 mb-4">
    <a href="{{ route('admin.temu-dokter.index') }}" class="text-dark">
        <div class="card grad-card gradient-purple text-white">
            <div class="card-body d-flex align-items-center">
                <div class="grad-icon mr-3 gradient-purple">📅</div>
                <div>
                    <h5 class="font-weight-bold">Temu Dokter</h5>
                    <p class="mb-0">Kelola antrean & reservasi dokter</p>
                </div>
            </div>
        </div>
    </a>
</div>


</div>

@endsection
