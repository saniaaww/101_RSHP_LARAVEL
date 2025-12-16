@extends('layouts.app')

@section('content')

<h2 class="text-2xl mb-4 font-semibold">Profil Dokter</h2>

<div class="card p-4">
    <table class="table table-bordered">
        <tr>
            <th>Nama User</th>
            <td>{{ $user->nama }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $dokter->alamat ?? '-' }}</td>
        </tr>
        <tr>
            <th>No HP</th>
            <td>{{ $dokter->no_hp ?? '-' }}</td>
        </tr>
        <tr>
            <th>Bidang Dokter</th>
            <td>{{ $dokter->bidang_dokter ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $dokter->jenis_kelamin ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('dokter.profil.edit') }}" class="btn btn-primary mt-3">
        Edit Profil
    </a>
</div>

@endsection
