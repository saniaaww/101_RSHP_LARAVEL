@extends('layouts.app')

@section('content')

<h2 class="text-2xl mb-4 font-semibold">Profil Perawat</h2>

<div class="card p-4">

    <table class="table table-bordered">
        <tr>
            <th>Nama User</th>
            <td>{{ $user->nama }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $perawat->alamat ?? '-' }}</td>
        </tr>
        <tr>
            <th>No HP</th>
            <td>{{ $perawat->no_hp ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $perawat->jenis_kelamin ?? '-' }}</td>
        </tr>
        <tr>
            <th>Pendidikan</th>
            <td>{{ $perawat->pendidikan ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('perawat.profil.edit') }}" class="btn btn-primary mt-3">Edit Profil</a>

</div>

@endsection
