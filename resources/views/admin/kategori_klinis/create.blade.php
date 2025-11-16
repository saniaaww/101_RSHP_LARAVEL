@extends('admin.layouts.admin')
@section('content')
<div class="py-8">
<h2 class="text-2xl font-semibold text-blue-800 mb-6">Tambah Kategori Klinis</h2>

<form action="{{ route('admin.kategori-klinis.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow">
@csrf

<div class="mb-4">
<label class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori Klinis</label>
<input type="text" name="nama_kategori_klinis" class="w-full p-2 border rounded-lg" required>
</div>

<button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
<a href="{{ route('admin.kategori-klinis.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg">Kembali</a>
</form>
</div>
@endsection
