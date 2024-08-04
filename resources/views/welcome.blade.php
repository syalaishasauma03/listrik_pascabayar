<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GenZap</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('images/head.png') }}">
    @vite('resources/css/app.css')

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F4F4F9; /* Light background color for a professional look */
            font-family: 'Figtree', sans-serif;
        }
        .nav-bar {
            background-color: #FFF; /* White background for a clean header */
            border-bottom: 2px solid #E0E0E0; /* Subtle border for separation */
        }
        .form-container {
            background-color: #FFF; /* White background for the form container */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Light shadow for depth */
        }
        .button-primary {
            background-color: #6C63FF; /* Modern pastel purple */
            color: #FFF;
        }
        .button-primary:hover {
            background-color: #5A54E6; /* Darker purple on hover */
        }
        .text-primary {
            color: #6C63FF; /* Matching the primary button color */
        }
        .card {
            background-color: #FFF; /* White background for cards */
            border: 1px solid #E0E0E0; /* Light border for structure */
        }
        .input-field {
            border: 1px solid #E0E0E0; /* Matching the card border */
            padding: 8px; /* Padding for input fields */
            width: 100%; /* Full width inputs */
            border-radius: 4px; /* Slight rounding of input fields */
        }
    </style>
</head>
<body class="bg-gray-100 antialiased">
    <nav class="nav-bar shadow-md p-4">
        <ul class="flex space-x-4">
            <li><a
                href="{{ route('login') }}"
                class="text-gray-800 px-4 py-2 rounded-md border border-transparent hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#6C63FF] focus:ring-opacity-50 transition duration-300" style="color: #6C63FF;">
                Admin 
            </a></li>
        </ul>
    </nav>

    <main class="max-w-2xl mx-auto p-6 mt-6 form-container rounded-lg shadow-lg">
        <!-- Input KWH Form -->
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-4 text-primary">Input KWH</h2>
            <form action="{{ route('tagihan.checkTagihan') }}" method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-4">
                @csrf
                <div class="mb-4">
                    <label for="kwh" class="block text-sm font-medium text-gray-700">KWH</label>
                    <input type="number" id="kwh" name="kwh" class="input-field mt-1" placeholder="Enter KWH">
                </div>
                <button type="submit" class="button-primary text-black px-4 py-2 rounded-md hover:bg-[#5A54E6] focus:outline-none focus:ring-2 focus:ring-[#6C63FF] focus:ring-opacity-50 transition duration-300">Cek Tagihan</button>
            </form>
        </section>

        <!-- Tagihan Details -->
        <section>
            <h2 class="text-2xl font-semibold mb-4 text-primary">Rincian Tagihan</h2>
            <div class="card shadow-md rounded-lg p-6">
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-800">Tagihan #{{ $data['tagihan_id'] ?? 'N/A' }}</h3>
                    <p class="text-sm text-gray-600">Pelanggan: {{ $data['nama_pelanggan'] ?? 'N/A' }}</p>
                    <p class="text-sm text-gray-600">Alamat: {{ $data['alamat'] ?? 'N/A' }}</p>
                </div>
                <div class="mb-4">
                    <h4 class="text-md font-medium text-gray-800">Detail</h4>
                    <ul class="list-disc pl-5 text-gray-600 space-y-1">
                        <li>Meter Awal: {{ $data['meter_awal'] ?? 0 }} kWh</li>
                        <li>Meter Akhir: {{ $data['meter_akhir'] ?? 0 }} kWh</li>
                        <li>Total KWH Digunakan: {{ $data['jumlah_kwh'] ?? 0 }} kWh</li>
                        <li>Total Tagihan: {{ number_format($data['total'] ?? 0, 0, ',', '.') }} IDR</li> <!-- Format sesuai kebutuhan -->
                    </ul>
                </div>
            </div>
        </section>
    </main>
</body>
</html>