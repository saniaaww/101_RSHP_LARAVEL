@extends('layouts.lte.main')

@section('title', 'Edit Ras')

@section('content')
<div class="container-fluid col-lg-6">

    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Edit Ras Hewan</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.ras.update', $data->idras_hewan) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama Ras -->
                <div class="form-group">
                    <label class="font-weight-semibold">Nama Ras</label>
                    <input type="text"
                           name="nama_ras"
                           value="{{ $data->nama_ras }}"
                           class="form-control"
                           required>
                </div>

                <!-- Jenis Hewan -->
                <div class="form-group">
                    <label class="font-weight-semibold">Jenis Hewan</label>
                    <select name="idjenis_hewan" class="form-control" required>
                        @foreach ($jenis as $j)
                            <option value="{{ $j->idjenis_hewan }}"
                                {{ $data->idjenis_hewan == $j->idjenis_hewan ? 'selected' : '' }}>
                                {{ $j->nama_jenis_hewan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol -->
                <div class="d-flex gap-2 mt-3">

                    <a href="{{ route('admin.ras.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i> Batal
                    </a>

                    <button class="btn btn-warning text-white">
                        <i class="fas fa-save mr-1"></i> Update
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>
@endsection
