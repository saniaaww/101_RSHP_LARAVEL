@extends('layouts.lte.main')

@section('title', 'Jenis Hewan')

@section('content')

<div class="container-fluid py-4">

    <!-- Header + Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="font-weight-bold text-primary" style="font-size:26px;">
            Data Jenis Hewan
        </h2>

        <a href="{{ route('admin.jenis.create') }}" 
           class="btn text-white"
           style="background: linear-gradient(135deg, #4A90E2, #6EC6FF); border-radius:10px;">
            + Tambah
        </a>
    </div>

    <!-- Card Container -->
    <div class="card shadow-sm border-0" style="border-radius:14px;">
        <div class="card-body">

            <table class="table table-bordered table-hover">
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Nama Jenis Hewan</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($jenis as $row)
                    <tr>
                        <td class="text-center">{{ $row->idjenis_hewan }}</td>
                        <td>{{ $row->nama_jenis_hewan }}</td>
                        <td class="text-center">

                            <!-- Edit -->
                            <a href="{{ route('admin.jenis.edit', $row->idjenis_hewan) }}"
                               class="btn btn-sm text-white"
                               style="background: linear-gradient(135deg, #00ACC1, #4DD0E1); border-radius:8px;">
                                Edit
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('admin.jenis.destroy', $row->idjenis_hewan) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button 
                                    class="btn btn-sm text-white"
                                    style="background: linear-gradient(135deg, #E53935, #EF5350); border-radius:8px;"
                                    onclick="return confirm('Hapus data ini?')">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted py-3">
                            Tidak ada data jenis hewan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
