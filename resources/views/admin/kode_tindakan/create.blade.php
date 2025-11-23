@extends('layouts.lte.main')
@section('content')

<div class="py-8">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Tambah Kode Tindakan / Terapi</h2>

    <form method="POST" action="{{ route('admin.kode-tindakan.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Kode</label>
            <input type="text" name="kode" class="w-full border p-2 rounded" required maxlength="5">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="deskripsi_tindakan_terapi" class="w-full border p-2 rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Kategori</label>
            <select name="idkategori" class="w-full border p-2 rounded" required>
                <option value="">-- pilih kategori --</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->idkategori }}">{{ $k->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Kategori Klinis</label>
            <select name="idkategori_klinis" class="w-full border p-2 rounded" required>
                <option value="">-- pilih kategori klinis --</option>
                @foreach($kategoriKlinis as $kk)
                    <option value="{{ $kk->idkategori_klinis }}">{{ $kk->nama_kategori_klinis }}</option>
                @endforeach
            </select>
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
        <a href="{{ route('admin.kode-tindakan.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded ml-2">Kembali</a>

    </form>
</div>

@endsection
