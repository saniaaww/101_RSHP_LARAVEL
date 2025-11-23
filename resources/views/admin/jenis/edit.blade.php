@extends('layouts.lte.main')

@section('title', 'Edit Jenis Hewan')

@section('content')

<div class="container-fluid py-4" style="max-width: 700px;">

    <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body">

            <h3 class="font-weight-bold mb-4 text-primary">
                Edit Jenis Hewan
            </h3>

            <form action="{{ route('admin.jenis.update', $jenis->idjenis_hewan) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Input -->
                <div class="form-group mb-4">
                    <label class="font-weight-semibold">Nama Jenis Hewan</label>
                    <input 
                        type="text" 
                        name="nama_jenis_hewan"
                        class="form-control"
                        value="{{ $jenis->nama_jenis_hewan }}"
                        placeholder="Masukkan nama jenis hewan..."
                        required
                    >
                </div>

                <!-- Buttons -->
                <div class="mt-4">

                    <a href="{{ route('admin.jenis.index') }}"
                       class="btn btn-secondary px-4 py-2"
                       style="border-radius:8px;">
                       Batal
                    </a>

                    <button 
                        type="submit"
                        class="btn text-white px-4 py-2 ml-2"
                        style="background: linear-gradient(135deg, #00ACC1, #4DD0E1); border-radius:8px;">
                        Update
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
