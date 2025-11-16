@extends('admin.layouts.admin')

@section('content')
<div class="flex justify-end mb-4">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button 
            type="submit" 
            class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition"
        >
            Logout
        </button>
    </form>
</div>
<h2 class="text-2xl font-bold mb-4">Daftar Pasien Hari Ini</h2>

<table class="table-auto w-full border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-2">No Urut</th>
            <th class="border p-2">Nama Pet</th>
            <th class="border p-2">Pemilik</th>
            <th class="border p-2">Dokter</th>
            <th class="border p-2">Waktu Daftar</th>
            <th class="border p-2">Status</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($data as $d)
        <tr>
            <td class="border p-2">{{ $d->no_urut }}</td>
            <td class="border p-2">{{ $d->pet->nama_pet ?? '-' }}</td>

            <td class="border p-2">
                {{ $d->pet->pemilik->nama ?? '-' }}
            </td>

            <td class="border p-2">
                {{ $d->roleUser->role->nama_role ?? 'Dokter' }}
            </td>

            <td class="border p-2">{{ $d->waktu_daftar }}</td>

            <td class="border p-2">
                @if ($d->status == '1') Menunggu
                @elseif ($d->status == '2') Selesai
                @else Batal
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center p-4">Tidak ada pasien</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
