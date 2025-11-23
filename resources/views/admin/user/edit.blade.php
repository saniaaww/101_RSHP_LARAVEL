@extends('layouts.lte.main')
@section('content')

<div class="max-w-xl mx-auto py-8">

    <h2 class="text-2xl font-semibold text-blue-800 mb-6">Edit User</h2>

    <div class="bg-white rounded-xl shadow p-6">

        <form action="{{ route('admin.user.update', $user->iduser) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block mb-1 font-medium">Nama</label>
            <input type="text" name="nama" value="{{ $user->nama }}" class="w-full p-2 border rounded mb-4">

            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="w-full p-2 border rounded mb-4">

            <label class="block mb-1 font-medium">Password (isi jika ingin ganti)</label>
            <input type="password" name="password" class="w-full p-2 border rounded mb-4">

            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
            <a href="{{ route('admin.user.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg">Batal</a>

        </form>

    </div>
</div>

@endsection
