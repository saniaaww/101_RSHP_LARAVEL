@extends('admin.layouts.admin')
@section('content')

<div class="py-8">
    <h2 class="text-2xl font-semibold text-blue-800 mb-6">Tambah Role</h2>

    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('admin.role.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Nama Role</label>
                <input type="text" name="nama_role" class="w-full border rounded p-2" required>
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
            <a href="{{ route('admin.role.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg">Kembali</a>
        </form>
    </div>
</div>

@endsection
