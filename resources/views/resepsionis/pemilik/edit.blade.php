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
            @foreach($users as $u)
            <option value="{{ $u->id }}" {{ $pemilik->iduser == $u->id ? 'selected' : '' }}>
                {{ $u->name }}
            </option>
            @endforeach
        </select>

        <button class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
