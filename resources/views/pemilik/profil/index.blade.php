@extends('layouts.lte.main')

@section('title', 'Profil Pemilik')

@section('content')

<h2 class="text-center font-weight-bold mb-4" style="font-size:28px; color:#1B3C73;">
    Profil Pemilik
</h2>

<div class="card-body">

    {{-- Nama --}}
    <div class="row mb-3">
        <div class="col-md-4 text-muted">Nama</div>
        <div class="col-md-8">{{ $user->nama }}</div>
    </div>

    {{-- Email --}}
    <div class="row mb-3">
        <div class="col-md-4 text-muted">Email</div>
        <div class="col-md-8">{{ $user->email }}</div>
    </div>

    {{-- Nomor WA --}}
    <div class="row mb-3">
        <div class="col-md-4 text-muted">No. WA</div>
        <div class="col-md-8">{{ $pemilik->no_wa ?? '-' }}</div>
    </div>

    {{-- Alamat --}}
    <div class="row mb-3">
        <div class="col-md-4 text-muted">Alamat</div>
        <div class="col-md-8">{{ $pemilik->alamat ?? '-' }}</div>
    </div>

</div>


    </div>
</div>

@endsection
