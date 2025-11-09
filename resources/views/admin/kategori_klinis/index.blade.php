@extends('admin.layouts.admin')
@section('content')
<div class="py-8">
<div class="flex items-center justify-between mb-6">
<h2 class="text-2xl font-semibold text-blue-800">Daftar Kategori Klinis</h2>
<a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Tambah</a>
</div>


<div class="bg-white rounded-xl shadow p-4">
<table class="w-full text-left">
<thead>
<tr class="text-sm text-blue-600">
<th class="p-3">ID</th>
<th class="p-3">Nama</th>
<th class="p-3">Aksi</th>
</tr>
</thead>
<tbody>
@foreach($kk as $k)
<tr class="border-t">
<td class="p-3">{{ $k->idkategori_klinis }}</td>
<td class="p-3">{{ $k->nama_kategori_klinis }}</td>
<td class="p-3">
<a href="#" class="text-sm text-blue-600 mr-3">Edit</a>
<a href="#" class="text-sm text-red-500">Hapus</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
@endsection