<!-- resources/views/tarif/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Tarif</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID Tarif: {{ $tarif->id_tarif }}</h5>
            <p class="card-text">Daya: {{ $tarif->daya }}</p>
            <p class="card-text">Tarif per kWh: {{ $tarif->tarifperkwh }}</p>
        </div>
    </div>
    <a href="{{ route('tarif.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
