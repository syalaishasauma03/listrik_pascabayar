<!-- resources/views/pelanggan/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Tombol Kembali dengan Ikon SVG -->
        <a href="{{ route ('admin.dashboard') }}" class="mr-3 d-flex align-items-center">
            <img src="{{ asset('icons/back.svg') }}" alt="Kembali" width="24" height="24">
        </a>
        <h1>Daftar Pelanggan</h1>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nomor KWH</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>ID Tarif</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->id_pelanggan }}</td>
                    <td>{{ $pelanggan->nomor_kwh }}</td>
                    <td>{{ $pelanggan->nama_pelanggan }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->id_tarif }}</td>
                    <td>
                        <a href="{{ route('pelanggan.show', $pelanggan->id_pelanggan) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('pelanggan.edit', $pelanggan->id_pelanggan) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pelanggan.destroy', $pelanggan->id_pelanggan) }}" method="POST" style="display:inline;">
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
