<!-- resources/views/tagihan/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start align-items-center mb-3">
        <!-- Ikon SVG Kembali -->
        <a href="{{ route ('tagihan.index') }}" class="d-flex align-items-center">
            <img src="{{ asset('icons/back.svg') }}" alt="Kembali" width="24" height="24" class="mr-2">
        </a>
    <h1>Edit Tagihan</h1>
    </div>

    <form action="{{ route('tagihan.update', $tagihan->id_tagihan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_penggunaan">ID Penggunaan</label>
            <input type="number" id="id_penggunaan" name="id_penggunaan" class="form-control" value="{{ $tagihan->id_penggunaan }}" required>
        </div>
        <div class="form-group">
            <label for="id_pelanggan">ID Pelanggan</label>
            <input type="number" id="id_pelanggan" name="id_pelanggan" class="form-control" value="{{ $tagihan->id_pelanggan }}" required>
        </div>
        <div class="form-group">
            <label for="bulan">Bulan</label>
            <input type="text" id="bulan" name="bulan" class="form-control" value="{{ $tagihan->bulan }}" required>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="text" id="tahun" name="tahun" class="form-control" value="{{ $tagihan->tahun }}" required>
        </div>
        <div class="form-group">
            <label for="jumlah_meter">Jumlah Meter</label>
            <input type="number" id="jumlah_meter" name="jumlah_meter" class="form-control" value="{{ $tagihan->jumlah_meter }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" id="status" name="status" class="form-control" value="{{ $tagihan->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
