<!-- resources/views/tagihan/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Tagihan</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID Tagihan: {{ $tagihan->id_tagihan }}</h5>
            <p class="card-text">ID Penggunaan: {{ $tagihan->id_penggunaan }}</p>
            <p class="card-text">ID Pelanggan: {{ $tagihan->id_pelanggan }}</p>
            <p class="card-text">Bulan: {{ $tagihan->bulan }}</p>
            <p class="card-text">Tahun: {{ $tagihan->tahun }}</p>
            <p class="card-text">Jumlah Meter: {{ $tagihan->jumlah_meter }}</p>
            <p class="card-text">Status: {{ $tagihan->status }}</p>
        </div>
    </div>
    <a href="{{ route('tagihan.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
