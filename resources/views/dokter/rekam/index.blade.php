@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Daftar Rekam Medis</h3>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal Dibuat</th>
                        <th>Anamnesa</th>
                        <th>Temuan Klinis</th>
                        <th>Diagnosa</th>
                        <th>Dokter Pemeriksa</th>
                        <th>ID Reservasi Dokter</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rekamMedis as $rekam)
                    <tr>
                        <td>{{ $rekam->idrekam_medis }}</td>
                        <td>{{ $rekam->created_at }}</td>
                        <td>{{ $rekam->anamnesa }}</td>
                        <td>{{ $rekam->temuan_klinis }}</td>
                        <td>{{ $rekam->diagnosa }}</td>
                        <td>{{ $rekam->dokter_pemeriksa }}</td>
                        <td>{{ $rekam->idreservasi_dokter }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data rekam medis.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
