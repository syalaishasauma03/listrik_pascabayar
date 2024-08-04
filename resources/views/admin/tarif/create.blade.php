<!-- resources/views/tarif/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start align-items-center mb-3">
        <!-- Ikon SVG Kembali -->
        <a href="{{ route ('tarif.index') }}" class="d-flex align-items-center">
            <img src="{{ asset('icons/back.svg') }}" alt="Kembali" width="24" height="24" class="mr-2">
        </a>
    <h1>Tambah Tarif Baru</h1>
    </div>

    <form action="{{ route('tarif.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="daya">Daya</label>
            <input type="number" id="daya" name="daya" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tarifperkwh">Tarif per kWh</label>
            <input type="number" id="tarifperkwh" name="tarifperkwh" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
