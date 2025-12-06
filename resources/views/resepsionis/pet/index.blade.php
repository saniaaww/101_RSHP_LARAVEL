@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Pet</h3>
    <a href="{{ route('resepsionis.pet.create') }}" class="btn btn-primary mb-3">Tambah Pet</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tgl Lahir</th>
                <th>Warna</th>
                <th>JK</th>
                <th>Pemilik</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pet as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->tanggal_lahir }}</td>
                <td>{{ $p->warna_tanda }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->pemilik->user->name }}</td>
                <td>
                    <a href="{{ route('resepsionis.pet.edit', $p->idpet) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('resepsionis.pet.destroy', $p->idpet) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
