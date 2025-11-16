@extends('admin.layouts.admin')
@section('content')

<div class="py-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-blue-800">Daftar User</h2>
        <a href="{{ route('admin.user.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Tambah User</a>
    </div>

    <div class="bg-white rounded-xl shadow p-4">
        <table class="w-full text-left">
            <thead>
                <tr class="text-sm text-blue-600">
                    <th class="p-3">ID</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($user as $u)
                <tr class="border-t">
                    <td class="p-3">{{ $u->iduser }}</td>
                    <td class="p-3">{{ $u->nama }}</td>
                    <td class="p-3">{{ $u->email }}</td>
                    <td class="p-3">
                        <a href="{{ route('admin.user.edit', $u->iduser) }}" class="text-blue-600 text-sm mr-3">Edit</a>

                        <form action="{{ route('admin.user.destroy', $u->iduser) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 text-sm" onclick="return confirm('Hapus user?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection
