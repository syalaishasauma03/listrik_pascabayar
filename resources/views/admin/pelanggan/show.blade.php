<!-- resources/views/pelanggan/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pelanggan</h1>

    <div class="card">
        <div class="card-header">Informasi Pelanggan</div>
        <div class="card-body">
            {{-- <p><strong>Username:</strong> {{ $pelanggan->username }}</p> --}}
            <p><strong>Nomor KWH:</strong> {{ $pelanggan->nomor_kwh }}</p>
            <p><strong>Nama:</strong> {{ $pelanggan->nama_pelanggan }}</p>
            <p><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
            <p><strong>ID Tarif:</strong> {{ $pelanggan->id_tarif }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary ">Kembali</a>
        </div>
    </div>
</div>
@endsection
