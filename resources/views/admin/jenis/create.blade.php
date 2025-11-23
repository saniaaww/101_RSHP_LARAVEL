@extends('layouts.lte.main')

@section('title', 'Tambah Jenis Hewan')

@section('content')

<div class="container-fluid py-4" style="max-width: 700px;">

    <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body">

            <h3 class="font-weight-bold mb-4 text-primary">
                Tambah Jenis Hewan
            </h3>

            <form action="{{ route('admin.jenis.store') }}" method="POST">
                @csrf

                <!-- Input -->
                <div class="form-group mb-4">
                    <label class="font-weight-semibold">Nama Jenis Hewan</label>
                    <input 
                        type="text" 
                        name="nama_jenis_hewan"
                        class="form-control"
                        placeholder="Masukkan nama jenis hewan..."
                        value="{{ old('nama_jenis_hewan') }}"
                    >

                    @error('nama_jenis_hewan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Submit -->
                <button 
                    class="btn text-white px-4 py-2"
                    style="background: linear-gradient(135deg, #4A90E2, #6EC6FF); border-radius:8px;">
                    Simpan
                </button>

                <a href="{{ route('admin.jenis.index') }}"
                   class="btn btn-secondary ml-2 px-4 py-2"
                   style="border-radius:8px;">
                    Batal
                </a>

            </form>

        </div>
    </div>

</div>

@endsection
