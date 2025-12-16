@extends('layouts.app')

@section('content')

<h2 class="text-2xl mb-4 font-semibold">Profil Pemilik</h2>

<div class="card p-4">

    <table class="table table-bordered">
        <tr>
            <th>Nama User</th>
            <td>{{ $user->nama }}</td>
        </tr>
        <tr>
            <th>No WA</th>
            <td>{{ $pemilik->no_wa ?? '-' }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $pemilik->alamat ?? '-' }}</td>
        </tr>
    </table>

    <a href="{{ route('pemilik.profil.edit') }}" class="btn btn-primary mt-3">Edit Profil</a>

</div>

@endsection
