@extends('layouts.lte.main')

@section('content')

<h2 class="mb-4 text-2xl font-semibold text-blue-800">Detail Rekam Medis</h2>

<a href="{{ route('admin.detail-rekam.create') }}" class="btn btn-primary mb-3">Tambah Detail</a>

<div class="card p-4">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Rekam Medis</th>
            <th>Tindakan</th>
            <th>Detail</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $d->iddetail_rekam_medis }}</td>
            <td>RM{{ $d->idrekam_medis }}</td>
            <td>{{ $d->tindakan->kode }} - {{ $d->tindakan->deskripsi_tindakan_terapi }}</td>
            <td>{{ Str::limit($d->detail, 30) }}</td>

            <td>
                <a href="{{ route('admin.detail-rekam.edit', $d->iddetail_rekam_medis) }}"
                   class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.detail-rekam.destroy', $d->iddetail_rekam_medis) }}" 
                      method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
</div>

@endsection
