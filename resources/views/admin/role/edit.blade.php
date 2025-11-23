@extends('layouts.lte.main')

@section('content')

<div class="max-w-xl mx-auto py-8">

    <h2 class="text-2xl font-bold text-blue-800 mb-6">Edit Role</h2>

    <div class="bg-white rounded-xl shadow p-6">

        <form action="{{ route('admin.role.update', $role->idrole) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Role
                </label>

                <input type="text"
                    name="nama_role"
                    value="{{ $role->nama_role }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"
                    required>

                @error('nama_role')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 mt-6">
                <a href="{{ route('admin.role.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                    Batal
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>

    </div>

</div>

@endsection
