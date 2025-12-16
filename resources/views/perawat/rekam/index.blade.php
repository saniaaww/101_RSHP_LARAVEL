@extends('layouts.app')

@section('content')

<h2 class="mb-4 text-2xl font-bold text-blue-800">Data Rekam Medis</h2>

<a href="{{ route('perawat.rekam.create') }}" class="btn btn-primary mb-3">
    Tambah Rekam Medis
</a>

<div class="card p-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal Dibuat</th>
                <th>ID Reservasi</th>
                <th>Dokter Pemeriksa</th>
                <th>Anamnesa</th>
                <th>Temuan Klinis</th>
                <th>Diagnosa</th>

                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($rekamMedis as $d)
            <tr>
                <td>{{ $d->idrekam_medis }}</td>
                <td>{{ \Carbon\Carbon::parse($d->created_at)->format('d-m-Y H:i') }}</td>
                <td>{{ $d->idreservasi_dokter }}</td>  
                <td>{{ $d->dokter?->user?->nama ?? '-' }}</td>
                <td>{{ Str::limit($d->anamnesa, 40) }}</td>
                <td>{{ Str::limit($d->temuan_klinis, 40) }}</td>
                <td>{{ Str::limit($d->diagnosa, 40) }}</td>
                
                    
                <td>
                    <a href="{{ route('perawat.rekam.edit', $d->idrekam_medis) }}" 
                       class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('perawat.rekam.destroy', $d->idrekam_medis) }}" 
                          method="POST" class="d-inline">
                        @csrf @method('DELETE')

                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus data?')">
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
