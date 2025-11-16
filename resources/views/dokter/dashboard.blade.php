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
<h2 class="text-2xl font-bold mb-4">Pasien Hari Ini</h2>

<table class="table-auto w-full border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-2">No Urut</th>
            <th class="border p-2">Nama Pet</th>
            <th class="border p-2">Pemilik</th>
            <th class="border p-2">Waktu Daftar</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($data as $d)
        <tr>
            <td class="border p-2">{{ $d->no_urut }}</td>
            <td class="border p-2">{{ $d->pet->nama_pet ?? '-' }}</td>
            <td class="border p-2">{{ $d->pet->pemilik->nama ?? '-' }}</td>
            <td class="border p-2">{{ $d->waktu_daftar }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
