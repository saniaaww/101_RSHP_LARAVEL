@extends('admin.layouts.admin')

@section('content')
<div class="py-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-blue-800">Daftar Ras Hewan</h2>
        <a href="{{ route('admin.ras.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Tambah Ras</a>
    </div>

    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3">Ras</th>
                <th class="p-3">Jenis Hewan</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $r)
            <tr class="border-b">
                <td class="p-3">{{ $r->nama_ras }}</td>
                <td class="p-3">{{ $r->jenis->nama_jenis_hewan }}</td>
                <td class="p-3">
                    <a href="{{ route('admin.ras.edit', $r->idras_hewan) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>
                    <form action="{{ route('admin.ras.destroy', $r->idras_hewan) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Hapus?')" class="px-3 py-1 bg-red-600 text-white rounded">
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
