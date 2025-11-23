@extends('layouts.lte.main')

@section('content')
<div class="py-8">
    <h2 class="text-2xl font-semibold text-blue-800 mb-6">Edit Kategori Klinis</h2>

    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('admin.kategori-klinis.update', $kategori->idkategori_klinis) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Nama Kategori Klinis</label>
                <input type="text" name="nama_kategori_klinis"
                       value="{{ $kategori->nama_kategori_klinis }}"
                       class="w-full border rounded-lg px-3 py-2">
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
            <a href="{{ route('admin.kategori-klinis.index') }}" class="ml-3 text-blue-700">Kembali</a>
        </form>
    </div>
</div>
@endsection
