@extends('layouts.lte.main')

@section('content')

<h2 class="text-2xl mb-4 font-semibold text-blue-800">Reservasi Temu Dokter</h2>

<a href="{{ route('admin.temu-dokter.create') }}" class="btn btn-primary mb-3">Tambah Reservasi</a>

<div class="card p-4">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>No Urut</th>
            <th>Pet</th>
            <th>Dokter</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $d->idreservasi_dokter }}</td>
            <td>{{ $d->no_urut }}</td>
            <td>{{ $d->pet->nama }}</td>
            <td>{{ $d->dokter->user->nama ?? '-' }}</td>
            <td>{{ $d->status }}</td>

            <td>
                <a href="{{ route('admin.temu-dokter.edit', $d->idreservasi_dokter) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.temu-dokter.destroy', $d->idreservasi_dokter) }}" 
                      class="d-inline" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('hapus?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
</div>

@endsection
