@extends('layouts.lte.main')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-semibold text-blue-700 mb-4">Edit Data Pet</h2>

    <form action="{{ route('resepsionis.pet.update', $pet->idpet) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm mb-1">Nama</label>
            <input type="text" name="nama" value="{{ $pet->nama }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm mb-1">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                <option value="Jantan" {{ $pet->jenis_kelamin == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                <option value="Betina" {{ $pet->jenis_kelamin == 'Betina' ? 'selected' : '' }}>Betina</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm mb-1">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ $pet->tanggal_lahir }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm mb-1">Ras</label>
            <select name="idras" class="w-full border p-2 rounded" required>
                @foreach($ras as $r)
                    <option value="{{ $r->idras }}" {{ $pet->idras == $r->idras ? 'selected' : '' }}>
                        {{ $r->nama_ras }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm mb-1">Pemilik</label>
            <select name="idpemilik" class="w-full border p-2 rounded" required>
                @foreach($pemilik as $p)
                    <option value="{{ $p->idpemilik }}" {{ $pet->idpemilik == $p->idpemilik ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>

</div>
@endsection
