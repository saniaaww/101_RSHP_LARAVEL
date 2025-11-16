@extends('admin.layouts.admin')

@section('content')
<div class="py-8 w-1/2 mx-auto">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Tambah Ras Hewan</h2>

    <form action="{{ route('admin.ras.store') }}" method="POST">
        @csrf

        <label>Nama Ras</label>
        <input type="text" name="nama_ras" class="w-full p-2 border rounded mb-4">

        <label>Jenis Hewan</label>
        <select name="idjenis_hewan" class="w-full p-2 border rounded mb-4">
            @foreach ($jenis as $j)
                <option value="{{ $j->idjenis_hewan }}">{{ $j->nama_jenis_hewan }}</option>
            @endforeach
        </select>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
