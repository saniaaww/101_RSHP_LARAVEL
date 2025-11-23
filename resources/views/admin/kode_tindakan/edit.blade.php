@extends('layouts.lte.main')
@section('content')

<div class="py-8 max-w-2xl mx-auto">

    <h2 class="text-2xl font-semibold text-blue-800 mb-6">
        Edit Kode Tindakan / Terapi
    </h2>

    <div class="bg-white rounded-xl shadow p-6">

        <form action="{{ route('admin.kode-tindakan.update', $kode->idkode_tindakan_terapi) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Kode --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Kode</label>
                <input type="text" name="kode"
                       value="{{ $kode->kode }}"
                       class="w-full px-4 py-2 border rounded-lg" required>

                @error('kode')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi_tindakan_terapi"
                          class="w-full px-4 py-2 border rounded-lg h-24" required>{{ $kode->deskripsi_tindakan_terapi }}</textarea>

                @error('deskripsi_tindakan_terapi')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kategori --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>

                <select name="idkategori" class="w-full px-4 py-2 border rounded-lg">
                    @foreach($kategori as $k)
                        <option value="{{ $k->idkategori }}"
                            {{ $kode->idkategori == $k->idkategori ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>

                @error('idkategori')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kategori Klinis --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori Klinis</label>

                <select name="idkategori_klinis" class="w-full px-4 py-2 border rounded-lg">
                    @foreach($kategoriKlinis as $kk)
                        <option value="{{ $kk->idkategori_klinis }}"
                            {{ $kode->idkategori_klinis == $kk->idkategori_klinis ? 'selected' : '' }}>
                            {{ $kk->nama_kategori_klinis }}
                        </option>
                    @endforeach
                </select>

                @error('idkategori_klinis')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex gap-4 mt-6">
                <a href="{{ route('admin.kode-tindakan.index') }}"
                   class="px-4 py-2 bg-gray-400 text-white rounded-lg">
                    Batal
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                    Update
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
