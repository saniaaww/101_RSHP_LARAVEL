@extends('admin.layouts.admin')

@section('content')
<div class="max-w-xl mx-auto py-8">

    <h2 class="text-2xl font-bold text-blue-800 mb-6">Edit Kategori</h2>

    <form action="{{ route('admin.kategori.update', $kategori->idkategori) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1">Nama Kategori</label>
            <input type="text" name="nama_kategori"
                   value="{{ $kategori->nama_kategori }}"
                   class="w-full border rounded-lg p-2"
                   required>
        </div>

        <div class="flex gap-4 mt-6">
            <a href="{{ route('admin.kategori.index') }}"
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
@endsection
