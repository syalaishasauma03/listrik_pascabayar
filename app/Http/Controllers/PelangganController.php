<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tarif;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan daftar semua pelanggan
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('admin.pelanggan.index',[ 'pelanggans' => $pelanggans ]);
    }

    // Menampilkan formulir untuk membuat pelanggan baru
    public function create()
    {
        $tarifs = Tarif::all();
        return view('admin.pelanggan.create', compact('tarifs'));
    }

    // Menyimpan pelanggan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nomor_kwh' => 'required|string|max:20',
            'nama_pelanggan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'id_tarif' => 'required|integer',
        ]);

        Pelanggan::create([
            'nomor_kwh' => $request->nomor_kwh,
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'id_tarif' => $request->id_tarif,
        ]);

        return redirect()->route('pelanggan.index')
                         ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Menampilkan detail pelanggan tertentu
    public function show(Pelanggan $pelanggan)
    {

        return view('admin.pelanggan.show', compact('pelanggan'));
    }

    // Menampilkan formulir untuk mengedit pelanggan
    public function edit(Pelanggan $pelanggan)
    {
        // $pelanggan = Pelanggan::find($pelanggan);
        return view('admin.pelanggan.edit', [ 'pelanggan' => $pelanggan ]);
    }

    // Memperbarui data pelanggan di database
    public function update(Request $request, Pelanggan $pelanggan)
    {
    // Validate the incoming request
    $request->validate([
        'nomor_kwh' => 'required|string|max:20',
        'nama_pelanggan' => 'required|string|max:255',
        'alamat' => 'required|string|max:500',
        'id_tarif' => 'required|integer',
    ]);

    // Update the record's attributes
    $pelanggan->update([
        'nomor_kwh' => $request->nomor_kwh,
        'nama_pelanggan' => $request->nama_pelanggan,
        'alamat' => $request->alamat,
        'id_tarif' => $request->id_tarif,
    ]);

    return redirect()->route('pelanggan.index')
                     ->with('success', 'Pelanggan berhasil diperbarui.');
}

public function destroy($id_pelanggan)
{
    $pelanggan = Pelanggan::find($id_pelanggan);

    if (!$pelanggan) {
        return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan.');
    }

    $pelanggan->delete();

    return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
}

}
