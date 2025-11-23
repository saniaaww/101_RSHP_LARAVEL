@extends('layouts.lte.main')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Tambah Pemilik</h2>

    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{ route('admin.pemilik.store') }}" method="POST">
            @csrf

            <label>Nomor WA</label>
            <input type="text" name="no_wa" class="w-full border p-2 rounded mb-4">

            <label>Alamat</label>
            <input type="text" name="alamat" class="w-full border p-2 rounded mb-4">

            <label>Pilih User</label>
            <select name="iduser" class="w-full border p-2 rounded mb-6">
                @foreach($user as $u)
                <option value="{{ $u->iduser }}">{{ $u->nama }} ({{ $u->email }})</option>
                @endforeach
            </select>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
        </form>
    </div>
</div>
@endsection
