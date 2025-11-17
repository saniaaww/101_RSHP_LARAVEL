@extends('admin.layouts.admin')

@section('content')
<div class="p-8 max-w-xl mx-auto">

    <h2 class="text-2xl font-bold mb-6">Edit Jenis Hewan</h2>

    <form action="{{ route('admin.jenis.update', $jenis->idjenis_hewan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama Jenis Hewan</label>
            <input type="text" name="nama_jenis_hewan"
                   value="{{ $jenis->nama_jenis_hewan }}"
                   class="w-full border p-2 rounded"
                   required>
        </div>

        <div class="flex gap-3 mt-4">
            <a href="{{ route('admin.jenis.index') }}"
               class="px-4 py-2 bg-gray-400 text-white rounded">
               Batal
            </a>

            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded">
                Update
            </button>
        </div>
    </form>

</div>
@endsection
