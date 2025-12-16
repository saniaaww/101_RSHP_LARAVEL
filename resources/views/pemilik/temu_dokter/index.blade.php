@extends('layouts.app')

@section('content')

<h2 class="text-2xl mb-4 font-semibold text-blue-800">
    Reservasi Temu Dokter
</h2>

<div class="card p-4">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>No Urut</th>
                <th>Waktu Daftar</th>
                <th>Pet</th>
                <th>Dokter</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($data as $d)
            <tr>
                <td class="text-center">{{ $d->idreservasi_dokter }}</td>
                <td class="text-center fw-bold">{{ $d->no_urut }}</td>
                
                <td class="text-center">
                    {{ \Carbon\Carbon::parse($d->waktu_daftar)->format('d-m-Y H:i') }}
                </td>
                
                <td>{{ $d->pet->nama ?? '-' }}</td>

                <td>{{ $d->dokter->user->nama ?? '-' }}</td>

                <td class="text-center">
                    @if($d->status === 'B')
                        <span class="badge bg-warning">Belum</span>
                    @else
                        <span class="badge bg-success">Selesai</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-muted">
                    Data reservasi belum ada
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
