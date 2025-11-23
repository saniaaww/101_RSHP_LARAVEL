@extends('layouts.lte.main')

@section('content')
<div class="py-8">
    <div class="flex justify-between mb-6">
        <h2 class="text-2xl font-semibold text-blue-800">Data Pemilik</h2>
        <a href="{{ route('admin.pemilik.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">+ Tambah</a>
    </div>

    <div class="bg-white shadow rounded-xl p-4">
        <table class="w-full text-left">
            <thead>
                <tr class="text-blue-600 text-sm">
                    <th class="p-3">Nama</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">No WA</th>
                    <th class="p-3">Alamat</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pemilik as $p)
                <tr class="border-t">
                    <td class="p-3">{{ $p->nama }}</td>
                    <td class="p-3">{{ $p->email }}</td>
                    <td class="p-3">{{ $p->no_wa }}</td>
                    <td class="p-3">{{ $p->alamat }}</td>

                    <td class="p-3">
                        <a href="{{ route('admin.pemilik.edit',$p->idpemilik) }}" class="text-blue-600 text-sm mr-3">Edit</a>

                        <form action="{{ route('admin.pemilik.destroy',$p->idpemilik) }}" method="POST" class="inline-block">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus?')" class="text-red-500 text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
