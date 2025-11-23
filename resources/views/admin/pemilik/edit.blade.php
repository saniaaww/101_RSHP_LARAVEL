@extends('layouts.lte.main')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Edit Pemilik</h2>

    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{ route('admin.pemilik.update', $pemilik->idpemilik) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nomor WA</label>
            <input type="text" name="no_wa" value="{{ $pemilik->no_wa }}" class="w-full border p-2 rounded mb-4">

            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ $pemilik->alamat }}" class="w-full border p-2 rounded mb-4">

            <label>Pilih User</label>
            <select name="iduser" class="w-full border p-2 rounded mb-6">
                @foreach($user as $u)
                <option value="{{ $u->iduser }}" @if($u->iduser == $pemilik->iduser) selected @endif>
                    {{ $u->nama }} ({{ $u->email }})
                </option>
                @endforeach
            </select>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        </form>
    </div>
</div>
@endsection
