@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Pemilik</h3>

    <form action="{{ route('resepsionis.pemilik.store') }}" method="POST">
        @csrf

         <label>User</label>
        <select name="iduser" class="form-control">
            @foreach($user as $u)
            <option value="{{ $u->iduser }}">{{ $u->nama }}</option>
            @endforeach
        </select>

        <label>No WA</label>
        <input type="text" name="no_wa" class="form-control">

        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control">


        <button class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
