@extends('layouts.app')

@section('content')

<h2 class="mb-4 text-2xl font-bold text-blue-800">Data Rekam Medis</h2>

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
                
                    
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection
