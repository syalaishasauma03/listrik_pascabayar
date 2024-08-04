<!-- resources/views/penggunaan/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Penggunaan</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID Penggunaan: {{ $penggunaan->id_penggunaan }}</h5>
            <p class="card-text">ID Pelanggan: {{ $penggunaan->id_pelanggan }}</p>
            <p class="card-text">Bulan: {{ $penggunaan->bulan }}</p>
            <p class="card-text">Tahun: {{ $penggunaan->tahun }}</p>
            <p class="card-text">Meter Awal: {{ $penggunaan->meter_awal }}</p>
            <p class="card-text">Meter Akhir: {{ $penggunaan->meter_akhir }}</p>
        </div>
    </div>
    <a href="{{ route('penggunaan.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
