<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    // Menampilkan daftar semua tarif
    public function index()
    {
        $tarifs = Tarif::all();
        return view('admin.tarif.index', compact('tarifs'));
    }

    // Menampilkan formulir untuk membuat tarif baru
    public function create()
    {
        return view('admin.tarif.create');
    }

    // Menyimpan tarif baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'daya' => 'required|numeric',
            'tarifperkwh' => 'required|numeric',
        ]);

        Tarif::create([
            'daya' => $request->daya,
            'tarifperkwh' => $request->tarifperkwh,
        ]);

        return redirect()->route('tarif.index')
                         ->with('success', 'Tarif berhasil ditambahkan.');
    }

    // Menampilkan detail tarif tertentu
    public function show(Tarif $tarif)
    {
        return view('admin.tarif.show', compact('tarif'));
    }

    // Menampilkan formulir untuk mengedit tarif
    public function edit(Tarif $tarif)
    {
        return view('admin.tarif.edit', compact('tarif'));
    }

    // Memperbarui data tarif di database
    public function update(Request $request, Tarif $tarif)
{
    $request->validate([
        'daya' => 'required|numeric',
        'tarifperkwh' => 'required|numeric',
    ]);

    $tarif->update([
        'daya' => $request->daya,
        'tarifperkwh' => $request->tarifperkwh,
    ]);

    return redirect()->route('tarif.index')
                     ->with('success', 'Tarif berhasil diperbarui.');
}

    // Menghapus tarif dari database
    public function destroy(Tarif $tarif)
{
    $tarif->delete();

    return redirect()->route('tarif.index')
                     ->with('success', 'Tarif berhasil dihapus.');
}
}
