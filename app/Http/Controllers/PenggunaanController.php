<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penggunaan;
use Illuminate\Http\Request;

class PenggunaanController extends Controller
{
    // Menampilkan daftar semua penggunaan
    public function index()
    {
        $penggunaans = Penggunaan::all();
        return view('admin.penggunaan.index', compact('penggunaans'));
    }

    // Menampilkan formulir untuk membuat penggunaan baru
    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('admin.penggunaan.create', compact('pelanggans'));
    }

    // Menyimpan penggunaan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|integer',
            'bulan' => 'required|string|max:2',
            'tahun' => 'required|string|max:4',
            'meter_awal' => 'required|integer',
            'meter_akhir' => 'required|integer',
        ]);

        Penggunaan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
        ]);

        return redirect()->route('penggunaan.index')
                         ->with('success', 'Penggunaan berhasil ditambahkan.');
    }

    // Menampilkan detail penggunaan tertentu
    public function show(Penggunaan $penggunaan)
    {
        return view('admin.penggunaan.show', compact('penggunaan'));
    }

    // Menampilkan formulir untuk mengedit penggunaan
    public function edit(Penggunaan $penggunaan)
    {
        // $penggunaan = penggunaan::find($penggunaan);
        return view('admin.penggunaan.edit', [ 'penggunaan' => $penggunaan ]);
    }

    // Memperbarui data penggunaan di database
    public function update(Request $request, Penggunaan $penggunaan)
    {
        $request->validate([
            'id_pelanggan' => 'required|integer',
            'bulan' => 'required|string|max:2',
            'tahun' => 'required|string|max:4',
            'meter_awal' => 'required|integer',
            'meter_akhir' => 'required|integer',
        ]);

        $penggunaan->update([
            'id_pelanggan' => $request->id_pelanggan,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
        ]);

        return redirect()->route('penggunaan.index')
                         ->with('success', 'Penggunaan berhasil diperbarui.');
    }

    // Menghapus penggunaan dari database
    public function destroy($id_penggunaan)
{
    $penggunaan = Penggunaan::find($id_penggunaan);

    if (!$penggunaan) {
        return redirect()->route('penggunaan.index')->with('error', 'penggunaan tidak ditemukan.');
    }

    $penggunaan->delete();

    return redirect()->route('penggunaan.index')->with('success', 'penggunaan berhasil dihapus.');
}
}
