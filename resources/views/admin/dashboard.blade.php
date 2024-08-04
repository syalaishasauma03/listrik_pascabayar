@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Pelanggan Card -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 rounded custom-rounded pastel-card">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title text-primary">
                            <i class="fas fa-users"></i> Pelanggan
                        </h5>
                        <p class="card-text text-secondary">Kelola data pelanggan.</p>
                    </div>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-primary mt-3 rounded">Lihat Pelanggan</a>
                </div>
            </div>
        </div>
        <!-- Penggunaan Card -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 rounded custom-rounded pastel-card">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title text-success">
                            <i class="fas fa-bolt"></i> Penggunaan
                        </h5>
                        <p class="card-text text-secondary">Kelola data penggunaan listrik.</p>
                    </div>
                    <a href="{{ route('penggunaan.index') }}" class="btn btn-success mt-3 rounded">Lihat Penggunaan</a>
                </div>
            </div>
        </div>
        <!-- Tagihan Card -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 rounded custom-rounded pastel-card">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title text-warning">
                            <i class="fas fa-file-invoice"></i> Tagihan
                        </h5>
                        <p class="card-text text-secondary">Kelola data tagihan.</p>
                    </div>
                    <a href="{{ route('tagihan.index') }}" class="btn btn-warning mt-3 rounded">Lihat Tagihan</a>
                </div>
            </div>
        </div>
        <!-- Tarif Card -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 rounded custom-rounded pastel-card">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title text-danger">
                            <i class="fas fa-money-bill"></i> Tarif
                        </h5>
                        <p class="card-text text-secondary">Kelola data tarif listrik.</p>
                    </div>
                    <a href="{{ route('tarif.index') }}" class="btn btn-danger mt-3 rounded">Lihat Tarif</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .pastel-card {
        background-color: #FFFFFF;
        border: 1px solid #E0E0E0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .text-primary {
        color: #6C63FF;
    }
    .btn-primary {
        background-color: #6C63FF;
        border-color: #6C63FF;
    }
    .btn-success {
        background-color: #28A745;
        border-color: #28A745;
    }
    .btn-warning {
        background-color: #FFC107;
        border-color: #FFC107;
    }
    .btn-danger {
        background-color: #DC3545;
        border-color: #DC3545;
    }
    .btn-primary:hover, .btn-success:hover, .btn-warning:hover, .btn-danger:hover {
        opacity: 0.8;
    }
    .text-secondary {
        color: #6C757D;
    }
</style>