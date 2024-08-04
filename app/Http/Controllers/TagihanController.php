<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Pelanggan;
use App\Models\Penggunaan;
use App\Models\Tarif;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    // Menampilkan daftar semua tagihan
    public function index()
    {
        $tagihans = Tagihan::all();
        return view('admin.tagihan.index', compact('tagihans'));
    }

    // Menampilkan formulir untuk membuat tagihan baru
    public function create()
    {
        $penggunaans = Penggunaan::all();   
        return view('admin.tagihan.create', compact('penggunaans'));
    }

    // Menyimpan tagihan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'id_penggunaan' => 'required|integer',
        ]);

        $penggunaan = Penggunaan::find($request->id_penggunaan);
        Tagihan::create([
            'id_penggunaan' => $request->id_penggunaan,
            'id_pelanggan' => $penggunaan->id_pelanggan,
            'bulan' => $penggunaan->bulan,
            'tahun' => $penggunaan->tahun,
            'jumlah_meter' =>$penggunaan->meter_akhir - $penggunaan->meter_awal  ,
            'status' => 'belum_dibayar',
        ]);

        return redirect()->route('tagihan.index')
                         ->with('success', 'Tagihan berhasil ditambahkan.');
    }

    // Menampilkan detail tagihan tertentu
    public function show(Tagihan $tagihan)
    {
        return view('admin.tagihan.show', compact('tagihan'));
    }

    // Menampilkan formulir untuk mengedit tagihan
    public function edit(Tagihan $tagihan)
    {
        return view('admin.tagihan.edit', compact('tagihan'));
    }

    // Memperbarui data tagihan di database
    public function update(Request $request, Tagihan $tagihan)
    {
        

        $tagihan->update([
      
            'status' => 'dibayar',
        ]);

        return redirect()->route('tagihan.index')
                         ->with('success', 'Tagihan berhasil diperbarui.');
    }

    // Menghapus tagihan dari database
    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();

        return redirect()->route('tagihan.index')
                         ->with('success', 'Tagihan berhasil dihapus.');
    }
    public function checkTagihan(Request $request)
{
    $noKwh = $request->input('kwh'); // Mengambil nilai 'kwh' dari request

    // Find customer by their nomor_kwh
    $pelanggan = Pelanggan::where('nomor_kwh', $noKwh)->first();

    // Check if customer exists
    if (!$pelanggan) {
        return view('welcome', [
            'data' => [
                'tagihan_id' => 0,
                'nama_pelanggan' => 'N/A',
                'alamat' => 'N/A',
                'meter_awal' => 0,
                'meter_akhir' => 0,
                'jumlah_kwh' => 0,
                'total' => 0
            ]
        ]);
    }

    // Fetch the rate and usage data
    $tarif = Tarif::where('id_tarif', $pelanggan->id_tarif)->first();
    $penggunaan = Penggunaan::where('id_pelanggan', $pelanggan->id_pelanggan)->first();
    $tagihan = Tagihan::where('id_penggunaan', $penggunaan->id_penggunaan)->first();

    // Calculate the total cost
    $jumlahKwh = $penggunaan ? ($penggunaan->meter_akhir - $penggunaan->meter_awal) : 0;
    $tarifPerKwh = $tarif ? $tarif->tarifperkwh : 0;
    
    // Fixed additional billing fee
    $additionalFee = 5000; // Example: Additional fee of 5000 units

    // Total calculation including the additional fee
    $total = ($jumlahKwh * $tarifPerKwh) + $additionalFee;

    $data = [
        'tagihan_id' => $tagihan ? $tagihan->id_tagihan : 0,
        'nama_pelanggan' => $pelanggan->nama_pelanggan,
        'alamat' => $pelanggan->alamat,
        'meter_awal' => $penggunaan ? $penggunaan->meter_awal : 0,
        'meter_akhir' => $penggunaan ? $penggunaan->meter_akhir : 0,
        'jumlah_kwh' => $jumlahKwh,
        'total' => $total
    ];

    return view('welcome', ['data' => $data]);
}
}

//tagihancontrolle