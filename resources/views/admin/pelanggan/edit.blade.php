<!-- resources/views/pelanggan/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start align-items-center mb-3">
        <!-- Ikon SVG Kembali -->
        <a href="{{ route ('pelanggan.index') }}" class="d-flex align-items-center">
            <img src="{{ asset('icons/back.svg') }}" alt="Kembali" width="24" height="24" class="mr-2">
        </a>
        <h1 class="mb-0">Edit Pelanggan</h1>
    </div>

    <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nomor_kwh">Nomor KWH</label>
            <input type="text" id="nomor_kwh" name="nomor_kwh" class="form-control" value="{{ $pelanggan->nomor_kwh }}" required>
        </div>
        <div class="form-group">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control" value="{{ $pelanggan->nama_pelanggan }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control" required>{{ $pelanggan->alamat }}</textarea>
        </div>
        <div class="form-group">
            <label for="id_tarif">ID Tarif</label>
            <input type="number" id="id_tarif" name="id_tarif" class="form-control" value="{{ $pelanggan->id_tarif }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
