@extends('admin.layouts.admin')

@section('content')
<div class="flex justify-end mb-4">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button 
            type="submit" 
            class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition"
        >
            Logout
        </button>
    </form>
</div>

<div class="py-8">
    <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">Data Master</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
<a href="{{ route('admin.data.jenis') }}" class="block bg-blue-100 p-8 rounded-2xl shadow hover:shadow-lg transition">
<div class="flex items-center gap-4">
<div class="w-14 h-14 bg-blue-200 rounded-xl flex items-center justify-center text-2xl">🐶</div>
<div>
<h3 class="text-lg font-semibold text-blue-800">Jenis Hewan</h3>
<p class="text-sm text-blue-600">Kelola jenis hewan</p>
</div>
</div>
</a>


<a href="{{ route('admin.data.ras') }}" class="block bg-blue-100 p-8 rounded-2xl shadow hover:shadow-lg transition">
<div class="flex items-center gap-4">
<div class="w-14 h-14 bg-blue-200 rounded-xl flex items-center justify-center text-2xl">🐾</div>
<div>
<h3 class="text-lg font-semibold text-blue-800">Ras Hewan</h3>
<p class="text-sm text-blue-600">Daftar ras dan hubungannya</p>
</div>
</div>
</a>


<a href="{{ route('admin.data.kategori') }}" class="block bg-blue-100 p-8 rounded-2xl shadow hover:shadow-lg transition">
<div class="flex items-center gap-4">
<div class="w-14 h-14 bg-blue-200 rounded-xl flex items-center justify-center text-2xl">🗂️</div>
<div>
<h3 class="text-lg font-semibold text-blue-800">Kategori</h3>
<p class="text-sm text-blue-600">Kategori layanan</p>
</div>
</div>
</a>


<a href="{{ route('admin.data.kategori_klinis') }}" class="block bg-blue-100 p-8 rounded-2xl shadow hover:shadow-lg transition">
<div class="flex items-center gap-4">
<div class="w-14 h-14 bg-blue-200 rounded-xl flex items-center justify-center text-2xl">💊</div>
<div>
<h3 class="text-lg font-semibold text-blue-800">Kategori Klinis</h3>
<p class="text-sm text-blue-600">Terapi vs Tindakan</p>
</div>
</div>
</a>


<a href="{{ route('admin.data.kode_tindakan') }}" class="block bg-blue-100 p-8 rounded-2xl shadow hover:shadow-lg transition">
<div class="flex items-center gap-4">
<div class="w-14 h-14 bg-blue-200 rounded-xl flex items-center justify-center text-2xl">⚕️</div>
<div>
<h3 class="text-lg font-semibold text-blue-800">Kode Tindakan</h3>
<p class="text-sm text-blue-600">Daftar kode & deskripsi tindakan</p>
</div>
</div>
</a>

<a href="{{ route('admin.data.pet') }}" class="block bg-blue-100 p-8 rounded-2xl shadow hover:shadow-lg transition">
<div class="flex items-center gap-4">
<div class="w-14 h-14 bg-blue-200 rounded-xl flex items-center justify-center text-2xl">🐕</div>
<div>
<h3 class="text-lg font-semibold text-blue-800">Daftar Pet</h3>
<p class="text-sm text-blue-600">Data hewan peliharaan</p>
</div>
</div>
</a>

<a href="{{ route('admin.data.role') }}" class="block bg-blue-100 p-8 rounded-2xl shadow hover:shadow-lg transition">
<div class="flex items-center gap-4">
<div class="w-14 h-14 bg-blue-200 rounded-xl flex items-center justify-center text-2xl">🧩</div>
<div>
<h3 class="text-lg font-semibold text-blue-800">Daftar Role</h3>
<p class="text-sm text-blue-600">Kelola peran user</p>
</div>
</div>
</a>

<a href="{{ route('admin.data.user') }}" class="block bg-blue-100 p-8 rounded-2xl shadow hover:shadow-lg transition">
<div class="flex items-center gap-4">
<div class="w-14 h-14 bg-blue-200 rounded-xl flex items-center justify-center text-2xl">👥</div>
<div>
<h3 class="text-lg font-semibold text-blue-800">Daftar User</h3>
<p class="text-sm text-blue-600">User beserta rolenya</p>
</div>
</div>
</a>
</div>
</div>
@endsection
