@extends('admin.layouts.admin')

@section('content')
<div class="py-8">
  <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">Dashboard Pemilik</h2>
  <p class="text-center text-blue-500 mb-10">Daftar Hewan Peliharaan Anda 🐕</p>

  <table class="w-full bg-white rounded-lg shadow">
    <thead class="bg-blue-200 text-blue-900">
      <tr>
        <th class="p-3">Nama Pet</th>
        <th class="p-3">Tanggal Lahir</th>
        <th class="p-3">Jenis Kelamin</th>
        <th class="p-3">Ras</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $p)
      <tr class="border-b hover:bg-blue-50">
        <td class="p-3 text-center">{{ $p->nama }}</td>
        <td class="p-3 text-center">{{ $p->tanggal_lahir }}</td>
        <td class="p-3 text-center">{{ $p->jenis_kelamin }}</td>
        <td class="p-3 text-center">{{ $p->rasHewan->nama_ras ?? '-' }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
