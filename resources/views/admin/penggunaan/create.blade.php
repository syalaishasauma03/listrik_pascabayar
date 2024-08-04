<!-- resources/views/penggunaan/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start align-items-center mb-3">
        <!-- Ikon SVG Kembali -->
        <a href="{{ route ('penggunaan.index') }}" class="d-flex align-items-center">
            <img src="{{ asset('icons/back.svg') }}" alt="Kembali" width="24" height="24" class="mr-2">
        </a>
    <h1>Tambah Penggunaan Baru</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('penggunaan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_pelanggan">ID Pelanggan</label>
            <select id="id_pelanggan" name="id_pelanggan" class="form-control" required>
                <option value="" disabled selected>Pilih ID Pelanggan</option>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id_pelanggan }}">{{ $pelanggan->id_pelanggan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="bulan">Bulan dalam angka</label>
            <input type="text" id="bulan" name="bulan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="text" id="tahun" name="tahun" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="meter_awal">Meter Awal</label>
            <input type="number" id="meter_awal" name="meter_awal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="meter_akhir">Meter Akhir</label>
            <input type="number" id="meter_akhir" name="meter_akhir" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
