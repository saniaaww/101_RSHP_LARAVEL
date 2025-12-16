@extends('layouts.lte.main')
@section('content')
<div class="py-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-blue-800">Daftar Role</h2>
        <a href="{{ route('admin.role.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Tambah Role</a>
    </div>

    <div>
        <table class="w-full text-left">
            <thead>
                <tr class="text-sm text-blue-600">
                    <th class="p-3">ID</th>
                    <th class="p-3">Nama Role</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach($role as $r)
                <tr class="border-t">
                    <td class="p-3">{{ $r->idrole }}</td>
                    <td class="p-3">{{ $r->nama_role }}</td>
                    <td class="p-3">
                        <a href="{{ route('admin.role.edit', $r->idrole) }}" class="text-blue-600 text-sm mr-3">Edit</a>

                        <form action="{{ route('admin.role.destroy', $r->idrole) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 text-sm" onclick="return confirm('Hapus role?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
