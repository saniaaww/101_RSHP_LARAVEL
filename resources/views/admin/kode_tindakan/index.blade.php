@extends('layouts.lte.main')
@section('content')

<div class="py-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-blue-800">Daftar Kode Tindakan / Terapi</h2>
        <a href="{{ route('admin.kode-tindakan.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Tambah Kode</a>
    </div>

    <div class="bg-white rounded-xl shadow p-4">
        <table class="w-full text-left">
            <thead>
                <tr class="text-sm text-blue-600">
                    <th class="p-3">Kode</th>
                    <th class="p-3">Deskripsi</th>
                    <th class="p-3">Kategori</th>
                    <th class="p-3">Kategori Klinis</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr class="border-t">
                    <td class="p-3">{{ $d->kode }}</td>
                    <td class="p-3">{{ $d->deskripsi_tindakan_terapi }}</td>
                    <td class="p-3">{{ $d->kategori->nama_kategori ?? '-' }}</td>
                    <td class="p-3">{{ $d->kategoriKlinis->nama_kategori_klinis ?? '-' }}</td>
                    <td class="p-3">
                        <a href="{{ route('admin.kode-tindakan.edit', $d->idkode_tindakan_terapi) }}" class="text-sm text-blue-600 mr-3">Edit</a>
                        <form action="{{ route('admin.kode-tindakan.destroy', $d->idkode_tindakan_terapi) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-sm text-red-500" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
