@extends('admin.layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold text-blue-600 mb-6">🧩 Daftar Role</h2>

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <table class="min-w-full text-left">
            <thead class="bg-blue-100 text-blue-700">
                <tr>
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">Nama Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $i => $role)
                <tr class="border-b hover:bg-blue-50 transition">
                    <td class="py-3 px-6">{{ $i + 1 }}</td>
                    <td class="py-3 px-6">{{ $role->nama_role }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
