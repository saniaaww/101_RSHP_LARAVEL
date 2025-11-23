@extends('layouts.lte.main')
@section('content')

<div class="py-10 max-w-2xl mx-auto">

    <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent mb-8">
        Edit Kategori
    </h2>

    <div class="bg-white/70 backdrop-blur-md border border-purple-100 rounded-2xl shadow-lg p-8">

        <form action="{{ route('admin.kategori.update', $kategori->idkategori) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="block font-semibold text-gray-700 mb-1">Nama Kategori</label>
                <input type="text" name="nama_kategori"
                       value="{{ $kategori->nama_kategori }}"
                       class="w-full border px-4 py-2 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none"
                       required>
            </div>

            <div class="flex gap-4 mt-6">
                <a href="{{ route('admin.kategori.index') }}"
                   class="px-5 py-2.5 bg-gray-400 text-white rounded-xl shadow hover:shadow-md transition">
                    Batal
                </a>

                <button type="submit"
                        class="px-5 py-2.5 bg-gradient-to-r from-purple-600 to-purple-500 text-white rounded-xl shadow hover:shadow-md transition">
                    Update
                </button>
            </div>
        </form>

    </div>
</div>

@endsection
