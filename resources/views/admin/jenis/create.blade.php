@extends('admin.layouts.admin')

@section('content')
<div class="flex justify-center items-center">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-2xl p-8 border border-blue-100">
        <h2 class="text-2xl font-semibold text-blue-800 text-center mb-6">
            Tambah Jenis Hewan
        </h2>

        <form action="{{ route('admin.jenis.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Input Nama Jenis Hewan -->
            <div>
                <label for="nama_jenis_hewan" class="block text-blue-800 font-medium mb-2">
                    Nama Jenis Hewan
                </label>
                <input type="text"
                       id="nama_jenis_hewan"
                       name="nama_jenis_hewan"
                       placeholder="Contoh: Kucing (Felis catus)"
                       value="{{ old('nama_jenis_hewan') }}"
                       class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none @error('nama_jenis_hewan') border-red-500 @enderror">

                @error('nama_jenis_hewan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Simpan & Batal -->
            <div class="flex justify-center gap-4 pt-4">
                <button type="submit"
                        class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-200">
                    <i class="bi bi-save2"></i> Simpan
                </button>
                <a href="{{ route('admin.jenis.index') }}"
                   class="px-6 py-2.5 bg-gray-400 hover:bg-gray-500 text-white font-semibold rounded-lg shadow-md transition duration-200">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
