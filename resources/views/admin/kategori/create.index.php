@extends('admin.layouts.admin')

@section('content')
<div class="flex justify-center items-center">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-2xl p-8 border border-blue-100">
        <h2 class="text-2xl font-semibold text-blue-800 text-center mb-6">Tambah Kategori</h2>

        <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="nama_kategori" class="block text-blue-800 font-medium mb-2">Nama Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" placeholder="Contoh: Vaksinasi"
                       value="{{ old('nama_kategori') }}"
                       class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                @error('nama_kategori')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center gap-4 pt-4">
                <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg">
                    Simpan
                </button>
                <a href="{{ route('admin.kategori.index') }}" class="px-6 py-2.5 bg-gray-400 hover:bg-gray-500 text-white font-semibold rounded-lg">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
