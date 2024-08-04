<!-- resources/views/tagihan/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start align-items-center mb-3">
        <!-- Ikon SVG Kembali -->
        <a href="{{ route ('tagihan.index') }}" class="d-flex align-items-center">
            <img src="{{ asset('icons/back.svg') }}" alt="Kembali" width="24" height="24" class="mr-2">
        </a>
    <h1>Tambah Tagihan Baru</h1>
    </div>

    <form action="{{ route('tagihan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_penggunaan">ID Penggunaan</label>
            <select id="id_penggunaan" name="id_penggunaan" class="form-control" required>
                <option value="" disabled selected>Pilih ID Penggunaan</option>
                @foreach($penggunaans as $penggunaan)
                    <option value="{{ $penggunaan->id_penggunaan }}">{{ $penggunaan->id_penggunaan }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
