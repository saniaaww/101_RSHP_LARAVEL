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

<h2 class="text-3xl font-bold text-center text-blue-700 mb-8">
    Dashboard Pemilik
</h2>

<table class="min-w-full bg-white border border-gray-300">
    <thead>
        <tr class="bg-blue-100">
            <th class="border p-3">ID</th>
            <th class="border p-3">Nama Pet</th>
            <th class="border p-3">Jenis</th>
            <th class="border p-3">Ras</th>
        </tr>
    </thead>

    <tbody>
        @forelse($data as $pet)
            <tr>
                <td class="border p-3">{{ $pet->idpet }}</td>
                <td class="border p-3">{{ $pet->nama_pet }}</td>
                <td class="border p-3">{{ $pet->jenis->nama_jenis ?? '-' }}</td>
                <td class="border p-3">{{ $pet->ras->nama_ras ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center p-4 text-gray-500">
                    Tidak ada data pet.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
