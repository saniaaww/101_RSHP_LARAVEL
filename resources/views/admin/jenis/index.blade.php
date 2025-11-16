@extends('admin.layouts.admin')

@section('content')
<div class="p-8">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Data Jenis Hewan</h2>
        <a href="{{ route('admin.jenis.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
           + Tambah
        </a>
    </div>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3">ID</th>
                <th class="p-3">Nama Jenis Hewan</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($jenis as $row)
            <tr>
                <td class="p-3">{{ $row->idjenis_hewan }}</td>
                <td class="p-3">{{ $row->nama_jenis_hewan }}</td>
                <td class="p-3">
                    <a href="{{ route('admin.jenis.edit', $row->idjenis_hewan) }}" class="text-blue-600">Edit</a>
                    |
                    <form action="{{ route('admin.jenis.destroy', $row->idjenis_hewan) }}"
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
