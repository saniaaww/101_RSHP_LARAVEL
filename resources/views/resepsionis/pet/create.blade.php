@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Pet</h3>

    <form action="{{ route('resepsionis.pet.store') }}" method="POST">
        @csrf

        <label>Nama</label>
        <input type="text" name="nama" class="form-control">

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control">

        <label>Warna Tanda</label>
        <input type="text" name="warna_tanda" class="form-control">

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>

        <label>Pemilik</label>
        <select name="idpemilik" class="form-control">
            @foreach($pemilik as $p)
            <option value="{{ $p->idpemilik }}">{{ $p->user->name }}</option>
            @endforeach
        </select>

        <button class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
