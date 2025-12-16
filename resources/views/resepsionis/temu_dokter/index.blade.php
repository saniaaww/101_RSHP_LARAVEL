@extends('layouts.app')

@section('content')

<h2 class="text-2xl mb-4 font-semibold text-blue-800">
    Reservasi Temu Dokter
</h2>

<a href="{{ route('resepsionis.temu-dokter.create') }}" class="btn btn-primary mb-3">
    Tambah Reservasi
</a>

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
                <th width="140">Aksi</th>
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

                <td class="text-center">
                    <a href="{{ route('resepsionis.temu-dokter.edit', $d->idreservasi_dokter) }}"
                       class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('resepsionis.temu-dokter.destroy', $d->idreservasi_dokter) }}"
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus data reservasi ini?')">
                            Hapus
                        </button>
                    </form>
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
