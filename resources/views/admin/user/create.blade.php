@extends('admin.layouts.admin')
@section('content')

<div class="py-8">

    <h2 class="text-2xl font-semibold text-blue-800 mb-6">Tambah User</h2>

    <div class="bg-white rounded-xl shadow p-6">

        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Nama</label>
                <input type="text" name="nama" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Password</label>
                <input type="password" name="password" class="w-full border rounded p-2" required>
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
            <a href="{{ route('admin.user.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg">Kembali</a>
        </form>

    </div>

</div>

@endsection
