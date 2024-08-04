<!-- resources/views/tagihan/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Tombol Kembali dengan Ikon SVG -->
        <a href="{{ route ('admin.dashboard') }}" class="mr-3 d-flex align-items-center">
            <img src="{{ asset('icons/back.svg') }}" alt="Kembali" width="24" height="24">
        </a>
    <h1>Daftar Tagihan</h1>
    <a href="{{ route('tagihan.create') }}" class="btn btn-primary mb-3">Tambah Tagihan</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID Tagihan</th>
                <th>ID Penggunaan</th>
                <th>ID Pelanggan</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Jumlah Meter</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tagihans as $tagihan)
                <tr>
                    <td>{{ $tagihan->id_tagihan }}</td>
                    <td>{{ $tagihan->id_penggunaan }}</td>
                    <td>{{ $tagihan->id_pelanggan }}</td>
                    <td>{{ $tagihan->bulan }}</td>
                    <td>{{ $tagihan->tahun }}</td>
                    <td>{{ $tagihan->jumlah_meter }}</td>
                    <td>{{ $tagihan->status }}</td>
                    <td>
                        <a href="{{ route('tagihan.show', $tagihan->id_tagihan) }}" class="btn btn-info btn-sm">Lihat</a>
                        <form action="{{ route('tagihan.update', $tagihan->id_tagihan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-warning btn-sm" {{ $tagihan->status === 'dibayar' ? 'disabled' : '' }}>
                                Sudah Dibayar
                            </button>
                        </form>                        <form action="{{ route('tagihan.destroy', $tagihan->id_tagihan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(function () {
                alert.style.opacity = '0';
                setTimeout(function () {
                    alert.style.display = 'none';
                }, 500); // waktu untuk transisi ke opacity 0
            }, 3000); // waktu sebelum alert menghilang (3 detik)
        }
    });
</script>
@endsection
