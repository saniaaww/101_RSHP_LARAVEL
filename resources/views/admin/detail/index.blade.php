@extends('layouts.lte.main')

@section('content')
<div class="container mt-4">
    <h3>Detail Rekam Medis</h3>

    <a href="{{ route('admin.detail.create') }}" class="btn btn-primary mb-3">+ Tambah Detail</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rekam Medis</th>
                <th>Tindakan</th>
                <th>Detail</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $d)
            <tr>
                <td>{{ $d->iddetail_rekam_medis }}</td>
                <td>{{ $d->rekamMedis->diagnosa ?? '-' }}</td>
                <td>{{ $d->kodeTindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                <td>{{ $d->detail }}</td>
                <td>
                    <a href="{{ route('admin.detail.edit', $d->iddetail_rekam_medis) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.detail.destroy', $d->iddetail_rekam_medis) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>

             

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
