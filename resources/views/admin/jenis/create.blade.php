@extends('admin.layouts.admin')

@section('content')
<div class="p-8">

    <h2 class="text-2xl font-bold mb-6">Tambah Jenis Hewan</h2>

    <form action="{{ route('admin.jenis.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Nama Jenis Hewan</label>
            <input type="text" name="nama_jenis_hewan"
                class="border p-2 w-full rounded" value="{{ old('nama_jenis_hewan') }}">

            @error('nama_jenis_hewan')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>

</div>
@endsection
