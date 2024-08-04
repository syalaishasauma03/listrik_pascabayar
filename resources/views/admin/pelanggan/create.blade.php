<!-- resources/views/pelanggan/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start align-items-center mb-3">
        <!-- Ikon SVG Kembali -->
        <a href="{{ route ('pelanggan.index') }}" class="d-flex align-items-center">
            <img src="{{ asset('icons/back.svg') }}" alt="Kembali" width="24" height="24" class="mr-2">
        </a>
        <h1 class="mb-0">Tambah Pelanggan Baru</h1>
    </div>

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomor_kwh">Nomor KWH</label>
            <input type="text" id="nomor_kwh" name="nomor_kwh" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="id_tarif">ID Tarif</label>
            <select id="id_tarif" name="id_tarif" class="form-control" required>
                <option value="" disabled selected>Pilih ID Tarif</option>
                @foreach($tarifs as $tarif)
                    <option value="{{ $tarif->id_tarif }}">{{ $tarif->id_tarif }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
