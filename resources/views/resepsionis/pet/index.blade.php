@extends('layouts.app')
@section('content')

<div class="py-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-blue-800">Daftar Hewan Peliharaan (Pet)</h2>
        <a href="{{ route('resepsionis.pet.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
            Tambah Pet
        </a>
    </div>

    <div>
       <table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID Pet</th>
            <th>Nama Hewan</th>
            <th>Tanggal Lahir</th>
            <th>Warna/Tanda</th>
            <th>Jenis Kelamin</th>
            <th>Pemilik</th>
            <th>Ras Hewan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pet as $p)
        <tr>
            <td>{{ $p->idpet }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->tanggal_lahir }}</td>
            <td>{{ $p->warna_tanda }}</td>
            <td>
                @if($p->jenis_kelamin === 'P')
                    Perempuan
                @elseif($p->jenis_kelamin === 'L')
                    Laki-laki
                @else
                    -
                @endif
            </td>
            <td>{{ $p->pemilik?->user?->nama ?? '-' }}</td>
            <td>{{ $p->ras->nama_ras ?? '-' }}</td>
    
                    <td class="p-3">
                        <a href="{{ route('resepsionis.pet.edit', $p->idpet) }}" class="text-sm text-blue-600 mr-3">Edit</a>

                        <form action="{{ route('resepsionis.pet.destroy', $p->idpet) }}" method="POST" class="inline">
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
