@extends('layouts.lte.main')
@section('content')

<div class="py-10 max-w-2xl mx-auto">

    <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-700 to-purple-600 text-transparent bg-clip-text mb-8">
        Tambah Kategori
    </h2>

    <div class="bg-white/70 backdrop-blur-md border border-blue-100 rounded-2xl shadow-lg p-8">

        <form action="{{ route('admin.kategori.store') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-1">Nama Kategori</label>
                <input type="text" name="nama_kategori"
                    class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    required>
                @error('nama_kategori')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 mt-6">
                <button class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-xl shadow hover:shadow-md transition">
                    Simpan
                </button>

                <a href="{{ route('admin.kategori.index') }}"
                    class="px-5 py-2.5 bg-gray-400 text-white rounded-xl shadow hover:shadow-md transition">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

@endsection
