<!-- resources/views/penggunaan/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start align-items-center mb-3">
        <!-- Ikon SVG Kembali -->
        <a href="{{ route ('penggunaan.index') }}" class="d-flex align-items-center">
            <img src="{{ asset('icons/back.svg') }}" alt="Kembali" width="24" height="24" class="mr-2">
        </a>
    <h1>Edit Penggunaan</h1>
    </div>

    <form action="{{ route('penggunaan.update', $penggunaan->id_penggunaan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_pelanggan">ID Pelanggan</label>
            <input type="number" id="id_pelanggan" name="id_pelanggan" class="form-control" value="{{ $penggunaan->id_pelanggan }}" required>
        </div>
        <div class="form-group">
            <label for="bulan">Bulan</label>
            <input type="text" id="bulan" name="bulan" class="form-control" value="{{ $penggunaan->bulan }}" required>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="text" id="tahun" name="tahun" class="form-control" value="{{ $penggunaan->tahun }}" required>
        </div>
        <div class="form-group">
            <label for="meter_awal">Meter Awal</label>
            <input type="number" id="meter_awal" name="meter_awal" class="form-control" value="{{ $penggunaan->meter_awal }}" required>
        </div>
        <div class="form-group">
            <label for="meter_akhir">Meter Akhir</label>
            <input type="number" id="meter_akhir" name="meter_akhir" class="form-control" value="{{ $penggunaan->meter_akhir }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
