@extends('admin.layouts.admin')

@section('content')
<div class="p-8">
    <h2 class="text-3xl font-bold text-blue-600 mb-6">👤 Daftar User</h2>

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <table class="min-w-full text-left border">
            <thead class="bg-blue-100 text-blue-700">
                <tr>
                    <th class="py-3 px-6">#</th>
                    <th class="py-3 px-6">Nama</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Password (hashed)</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $i => $user)
                <tr class="border-b hover:bg-blue-50 transition">
                    <td class="py-3 px-6">{{ $i + 1 }}</td>
                    <td class="py-3 px-6">{{ $user->nama }}</td>
                    <td class="py-3 px-6">{{ $user->email }}</td>
                    <td class="py-3 px-6 font-mono text-gray-500 text-sm">
                        {{ $user->password }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500">Tidak ada data user</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
