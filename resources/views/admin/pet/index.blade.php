@extends('layouts.lte.main')
@section('content')

<div class="py-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-blue-800">Daftar Hewan Peliharaan (Pet)</h2>
        <a href="{{ route('admin.pet.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
            Tambah Pet
        </a>
    </div>

    <div class="bg-white rounded-xl shadow p-4">
        <table class="w-full text-left">
            <thead>
            <tr class="text-sm text-blue-600">
                <th class="p-3">ID</th>
                <th class="p-3">Nama</th>
                <th class="p-3">Jenis Kelamin</th>
                <th class="p-3">Tanggal Lahir</th>
                <th class="p-3">Ras</th>
                <th class="p-3">Pemilik</th>
                <th class="p-3">Aksi</th>
            </tr>
            </thead>
            <tbody>

            @foreach($pet as $p)
                <tr class="border-t">
                    <td class="p-3">{{ $p->idpet }}</td>
                    <td class="p-3">{{ $p->nama }}</td>
                    <td class="p-3">{{ $p->jenis_kelamin }}</td>
                    <td class="p-3">{{ $p->tanggal_lahir }}</td>
                    <td class="p-3">{{ optional($p->ras)->nama_ras }}</td>
                    <td class="p-3">{{ optional($p->pemilik)->nama }}</td>

                    <td class="p-3">
                        <a href="{{ route('admin.pet.edit', $p->idpet) }}" class="text-sm text-blue-600 mr-3">Edit</a>

                        <form action="{{ route('admin.pet.destroy', $p->idpet) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-sm text-red-500"
                                    onclick="return confirm('Yakin hapus?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
