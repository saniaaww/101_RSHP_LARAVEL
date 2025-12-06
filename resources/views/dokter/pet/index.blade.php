@extends('layouts.lte.main')

@section('title', 'Data Pasien')

@section('content')
<h2 class="mb-4">Data Pasien (Pet)</h2>

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
            <td>{{ $p->pemilik->nama ?? '-' }}</td>
            <td>{{ $p->ras->nama_ras ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
