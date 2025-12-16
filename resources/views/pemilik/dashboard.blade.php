@extends('layouts.app')

@section('title', 'Dashboard Pemilik')

@section('content')

<!-- Logout button -->
<div class="row mb-4">
    <div class="col text-right">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger shadow-sm px-4 py-2" style="font-family:'Poppins', sans-serif;">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
        </form>
    </div>
</div>

<!-- Welcome Message -->
<div class="text-center mb-3">
    <h3 style="font-family:'Poppins', sans-serif; color:#1B3C73; font-weight:600;">
        Selamat Datang, Pemilik 🐾
    </h3>
    <p style="font-family:'Nunito', sans-serif; font-size:15px; color:#555;">
        Senang melihat Anda kembali! Silakan pilih menu di bawah ini.
    </p>
</div>

<!-- Header -->
<h2 class="text-center font-weight-bold mb-5" style="font-size:26px; color:#1B3C73; font-family:'Poppins', sans-serif;">
    Menu Pemilik
</h2>

<!-- Custom Fonts & Styles -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Nunito:wght@400;700&display=swap');

    body, h5, p, a, button {
        font-family: 'Poppins', sans-serif;
    }

    a {
        text-decoration: none !important; /* hilangkan garis bawah */
    }

    .grad-card {
        border-radius: 20px;
        padding: 20px;
        transition: 0.3s;
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        border: none;
        backdrop-filter: blur(10px);
        background: rgba(255,255,255,0.15);
    }
    .grad-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 14px 35px rgba(0,0,0,0.18);
    }
    .grad-icon {
        width: 70px; height: 70px; border-radius: 16px;
        font-size: 30px; display: flex; align-items: center; justify-content: center;
        color: white; margin-right: 20px;
    }
    .gradient-blue { background: linear-gradient(135deg, #4A90E2, #6EC6FF); }
    .gradient-green { background: linear-gradient(135deg, #4CAF50, #81C784); }
    .gradient-purple { background: linear-gradient(135deg, #8E24AA, #BA68C8); }
    .gradient-red { background: linear-gradient(135deg, #E53935, #EF5350); }
    .card-body h5 { font-size: 18px; margin-bottom: 6px; font-weight:600; }
    .card-body p { font-size: 14px; opacity: 0.85; }
</style>

<!-- Cards Grid -->
<div class="row justify-content-center">

    {{-- Temu Dokter --}}
    <div class="col-md-5 col-sm-6 mb-4">
        <a href="{{ route('pemilik.temu-dokter.index') }}" class="text-dark">
            <div class="card grad-card text-white d-flex align-items-center gradient-purple">
                <div class="grad-icon gradient-purple">📅</div>
                <div>
                    <h5>Jadwal Temu Dokter</h5>
                    <p>Lihat reservasi dokter</p>
                </div>
            </div>
        </a>
    </div>

    {{-- Rekam Medis --}}
    <div class="col-md-5 col-sm-6 mb-4">
        <a href="{{ route('pemilik.rekam.index') }}" class="text-dark">
            <div class="card grad-card text-white d-flex align-items-center gradient-red">
                <div class="grad-icon gradient-red">📋</div>
                <div>
                    <h5>Rekam Medis</h5>
                    <p>Riwayat kesehatan hewan</p>
                </div>
            </div>
        </a>
    </div>

    {{-- Profil --}}
    <div class="col-md-5 col-sm-6 mb-4">
        <a href="{{ route('pemilik.profil.index') }}" class="text-dark">
            <div class="card grad-card text-white d-flex align-items-center gradient-blue">
                <div class="grad-icon gradient-blue">👤</div>
                <div>
                    <h5>Profil</h5>
                    <p>Lihat profil Anda</p>
                </div>
            </div>
        </a>
    </div>

    {{-- Hewan Peliharaan --}}
    <div class="col-md-5 col-sm-6 mb-4">
        <a href="{{ route('pemilik.pet.index') }}" class="text-dark">
            <div class="card grad-card text-white d-flex align-items-center gradient-green">
                <div class="grad-icon gradient-green">🐶</div>
                <div>
                    <h5>Hewan Peliharaan</h5>
                    <p>Lihat daftar hewan Anda</p>
                </div>
            </div>
        </a>
    </div>

</div>
@endsection