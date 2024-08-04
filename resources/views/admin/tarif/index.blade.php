@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Tombol Kembali dengan Ikon SVG -->
        <a href="{{ route ('admin.dashboard') }}" class="mr-3 d-flex align-items-center">
            <img src="{{ asset('icons/back.svg') }}" alt="Kembali" width="24" height="24">
        </a>
        <h1>Daftar Tarif</h1>
        <a href="{{ route('tarif.create') }}" class="btn btn-primary mb-3">Tambah Tarif</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID Tarif</th>
                <th>Daya</th>
                <th>Tarif per kWh</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarifs as $tarif)
                <tr>
                    <td>{{ $tarif->id_tarif }}</td>
                    <td>{{ $tarif->daya }}</td>
                    <td>{{ $tarif->tarifperkwh }}</td>
                    <td>
                        <a href="{{ route('tarif.edit', $tarif->id_tarif) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tarif.destroy', $tarif->id_tarif) }}" method="POST" style="display:inline;">
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
