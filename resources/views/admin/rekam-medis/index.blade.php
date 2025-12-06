@extends('layouts.lte.main')

@section('content')

<h2 class="mb-4 text-2xl font-bold text-blue-800">Data Rekam Medis</h2>

<a href="{{ route('admin.rekam-medis.create') }}" class="btn btn-primary mb-3">Tambah Rekam Medis</a>

<div class="card p-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Anamnesa</th>
                <th>Temuan Klinis</th>
                <th>Diagnosa</th>
                <th>Dokter Pemeriksa</th>
                <th>ID Reservasi Dokter</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($rekamMedis as $d)
            <tr>
                <td>{{ $d->idrekam_medis }}</td>
                <td>{{ Str::limit($d->anamnesa, 30) }}</td>
                <td>{{ Str::limit($d->temuan_klinis, 30) }}</td>
                <td>{{ Str::limit($d->diagnosa, 30) }}</td>
                <td>{{ $d->dokter_pemeriksa }}</td>
                <td>{{ $d->idreservasi_dokter }}</td>
                <td>
                    <a href="{{ route('admin.rekam-medis.edit', $d->idrekam_medis) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.rekam-medis.destroy', $d->idrekam_medis) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">
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
