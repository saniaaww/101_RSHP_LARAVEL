@extends('layouts.lte.main')

@section('title', 'Tambah Ras')

@section('content')
<div class="container-fluid col-lg-6">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Ras Hewan</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.ras.store') }}" method="POST">
                @csrf

                <!-- Input Nama Ras -->
                <div class="form-group">
                    <label class="font-weight-semibold">Nama Ras</label>
                    <input type="text" name="nama_ras" class="form-control" value="{{ old('nama_ras') }}" required>
                </div>

                <!-- Dropdown Jenis Hewan -->
                <div class="form-group">
                    <label class="font-weight-semibold">Jenis Hewan</label>
                    <select name="idjenis_hewan" class="form-control" required>
                        <option value="">-- Pilih Jenis Hewan --</option>
                        @foreach ($jenis as $j)
                            <option value="{{ $j->idjenis_hewan }}">{{ $j->nama_jenis_hewan }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol -->
                <button class="btn btn-primary px-4">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
