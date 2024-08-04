<!-- resources/views/penggunaan/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Tombol Kembali dengan Ikon SVG -->
        <a href="{{ route ('admin.dashboard') }}" class="mr-3 d-flex align-items-center">
            <img src="{{ asset('icons/back.svg') }}" alt="Kembali" width="24" height="24">
        </a>
    <h1>Daftar Penggunaan</h1>
    <a href="{{ route('penggunaan.create') }}" class="btn btn-primary mb-3">Tambah Penggunaan</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID Penggunaan</th>
                <th>ID Pelanggan</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Meter Awal</th>
                <th>Meter Akhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penggunaans as $penggunaan)
                <tr>
                    <td>{{ $penggunaan->id_penggunaan }}</td>
                    <td>{{ $penggunaan->id_pelanggan }}</td>
                    <td>{{ $penggunaan->bulan }}</td>
                    <td>{{ $penggunaan->tahun }}</td>
                    <td>{{ $penggunaan->meter_awal }}</td>
                    <td>{{ $penggunaan->meter_akhir }}</td>
                    <td>
                        <a href="{{ route('penggunaan.show', $penggunaan->id_penggunaan) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('penggunaan.edit', $penggunaan->id_penggunaan) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('penggunaan.destroy', $penggunaan->id_penggunaan) }}" method="POST" style="display:inline;">
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
