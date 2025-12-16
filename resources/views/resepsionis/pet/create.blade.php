@extends('layouts.app')

@section('content')

<div class="py-8">
    <h2 class="text-2xl font-semibold text-blue-800 mb-6">
        Tambah Data Pet
    </h2>

    <div class="bg-white p-6 rounded-xl shadow">

        <form action="{{ route($folder.'.pet.store') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama Pet</label>
                <input type="text" name="nama" class="w-full border rounded p-2" required>
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full border rounded p-2" required>
            </div>

            <!-- Warna -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Warna / Tanda</label>
                <input type="text" name="warna_tanda" class="w-full border rounded p-2">
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border p-2 rounded" required>
                    <option value="">-- Pilih --</option>
                    <option value="L">Jantan</option>
                    <option value="P">Betina</option>
                </select>
            </div>

            <!-- Pemilik -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Pemilik</label>
                <select name="idpemilik" class="w-full border p-2 rounded" required>
                    <option value="">-- Pilih Pemilik --</option>
                    @foreach($pemilik as $pm)
                        <option value="{{ $pm->idpemilik }}">
                            {{ $pm->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Ras -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Ras Hewan</label>
                <select name="idras_hewan" class="w-full border p-2 rounded" required>
                    <option value="">-- Pilih Ras --</option>
                    @foreach($ras as $r)
                        <option value="{{ $r->idras_hewan }}">
                            {{ $r->nama_ras }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Button -->
            <div class="flex gap-2">
                <button class="px-4 py-2 bg-blue-600 text-white rounded">
                    Simpan
                </button>

                <a href="{{ route($folder.'.pet.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

@endsection
