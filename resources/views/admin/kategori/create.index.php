@extends('admin.layouts.admin')
@section('content')

<div class="py-8">
<h2 class="text-2xl font-semibold text-blue-800 mb-6">Tambah Kategori</h2>

<div class="bg-white rounded-xl shadow p-6">

<form action="{{ route('admin.kategori.store') }}" method="POST">
@csrf

<div class="mb-4">
<label class="block text-sm font-medium text-gray-700">Nama Kategori</label>
<input type="text" name="nama_kategori" class="w-full px-4 py-2 border rounded-lg" required>
@error('nama_kategori')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror
</div>

<button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
<a href="{{ route('admin.kategori.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg">Kembali</a>

</form>

</div>
</div>

@endsection
