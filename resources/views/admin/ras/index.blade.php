@extends('layouts.lte.main')

@section('title', 'Ras Hewan')

@section('content')
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0 font-weight-bold">Daftar Ras Hewan</h3>
        <a href="{{ route('admin.ras.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus mr-1"></i> Tambah Ras
        </a>
    </div>

    <!-- Card Table -->
    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="bg-gradient-primary text-white">
                    <tr>
                        <th class="p-3">Ras</th>
                        <th class="p-3">Jenis Hewan</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $r)
                    <tr>
                        <td class="p-3">{{ $r->nama_ras }}</td>
                        <td class="p-3">{{ $r->jenis->nama_jenis_hewan }}</td>
                        <td class="p-3 text-center">

                            <a href="{{ route('admin.ras.edit', $r->idras_hewan) }}"
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.ras.destroy', $r->idras_hewan) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus data ini?')"
                                        class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
