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
  <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">Dashboard Resepsionis</h2>
  <p class="text-center text-blue-500 mb-10">Data Pendaftaran Temu Dokter 🩵</p>

  <table class="w-full bg-white rounded-lg shadow">
    <thead class="bg-blue-200 text-blue-900">
      <tr>
        <th class="p-3">No Urut</th>
        <th class="p-3">Nama Pet</th>
        <th class="p-3">Tanggal Daftar</th>
        <th class="p-3">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $d)
      <tr class="border-b hover:bg-blue-50">
        <td class="p-3 text-center">{{ $d->no_urut }}</td>
        <td class="p-3 text-center">{{ $d->pet->nama ?? '-' }}</td>
        <td class="p-3 text-center">{{ $d->waktu_daftar }}</td>
        <td class="p-3 text-center">{{ $d->status }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
