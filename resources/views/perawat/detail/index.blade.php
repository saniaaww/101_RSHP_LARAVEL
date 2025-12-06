@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Detail Rekam Medis</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rekam Medis</th>
                <th>Tindakan</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $d)
            <tr>
                <td>{{ $d->iddetail_rekam_medis }}</td>
                <td>{{ $d->rekamMedis->diagnosa ?? '-' }}</td>
                <td>{{ $d->kodeTindakan->deskripsi_tindakan_terapi ?? '-' }}</td>
                <td>{{ $d->detail }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
