@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Pemilik</h3>

    <form action="{{ route('resepsionis.pemilik.update', $pemilik->idpemilik) }}" method="POST">
        @csrf @method('PUT')

        <label>No WA</label>
        <input type="text" name="no_wa" class="form-control" value="{{ $pemilik->no_wa }}">

        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ $pemilik->alamat }}">

        <label>User</label>
        <select name="iduser" class="form-control">
            @foreach($user as $u)
            <option value="{{ $u->iduser }}" {{ $pemilik->iduser == $u->iduser ? 'selected' : '' }}>
                {{ $u->nama }}
            </option>
            @endforeach
        </select>

        <button class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
