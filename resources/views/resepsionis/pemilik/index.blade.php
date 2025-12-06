@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Pemilik</h3>
    <a href="{{ route('resepsionis.pemilik.create') }}" class="btn btn-primary mb-3">Tambah Pemilik</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No WA</th>
                <th>Alamat</th>
                <th>User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemilik as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->no_wa }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->iduser }}</td>
                <td>
                    <a href="{{ route('resepsionis.pemilik.edit', $p->idpemilik) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('resepsionis.pemilik.destroy', $p->idpemilik) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
