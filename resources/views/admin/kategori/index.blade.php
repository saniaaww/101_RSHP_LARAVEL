@extends('layouts.lte.main')
@section('content')

<div class="py-10">

    <div class="flex items-center justify-between mb-10">
        <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-800 to-purple-700 text-transparent bg-clip-text">
            Daftar Kategori
        </h2>

        <a href="{{ route('admin.kategori.create') }}"
           class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-xl shadow hover:shadow-md transition">
            + Tambah Kategori
        </a>
    </div>

    <div class="bg-white/70 backdrop-blur-md border border-blue-100 rounded-2xl shadow-lg p-6">

        <table class="w-full">
            <thead>
                <tr class="text-blue-700 text-sm border-b">
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Nama Kategori</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">
                @foreach($kategori as $k)
                <tr class="border-b hover:bg-blue-50/60 transition">
                    <td class="p-3 font-semibold">{{ $k->idkategori }}</td>
                    <td class="p-3">{{ $k->nama_kategori }}</td>
                    <td class="p-3 flex gap-3">

                        <a href="{{ route('admin.kategori.edit', $k->idkategori) }}"
                           class="px-3 py-1.5 bg-yellow-200 text-yellow-800 rounded-lg hover:bg-yellow-300 transition shadow">
                           Edit
                        </a>

                        <form action="{{ route('admin.kategori.destroy', $k->idkategori) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1.5 bg-red-200 text-red-700 rounded-lg hover:bg-red-300 transition shadow">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

@endsection
