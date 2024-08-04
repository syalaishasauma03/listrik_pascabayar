<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\TagihanController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

route::get('admin/dashboard',[HomeController::class,'index'])->name('admin.dashboard')->middleware(['auth','admin']);

//pelanggan
route::resource('pelanggan', PelangganController::class);
route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
route::get('/pelanggan/edit/{pelanggan:id_pelanggan}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
route::put('/pelanggan/update/{pelanggan:id_pelanggan}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/delete/{id_pelanggan}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
route::post('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');

//penggunaan
route::resource('penggunaan', PenggunaanController::class);
route::get('/penggunaan', [PenggunaanController::class, 'index'])->name('penggunaan.index');
route::post('/penggunaan/create', [PenggunaanController::class, 'create'])->name('penggunaan.create');
route::post('/penggunaan', [PenggunaanController::class, 'store'])->name('penggunaan.store');
route::get('/penggunaan/edit/{penggunaan:id_penggunaan}', [PenggunaanController::class, 'edit'])->name('penggunaan.edit');
route::put('/penggunaan/update/{penggunaan:id_penggunaan}', [PenggunaanController::class, 'update'])->name('penggunaan.update');
Route::delete('/penggunaan/delete/{id_penggunaan}', [PenggunaanController::class, 'destroy'])->name('penggunaan.destroy');

//tarif
route::resource('tarif', TarifController::class);
route::get('/tarif', [TarifController::class, 'index'])->name('tarif.index');
route::post('/tarif/create', [TarifController::class, 'create'])->name('tarif.create');
route::post('/tarif', [TarifController::class, 'store'])->name('tarif.store');
Route::put('/tarif/{tarif}', [TarifController::class, 'update'])->name('tarif.update');
route::put('/tarif/update/{tarif:id_tarif}', [TarifController::class, 'update'])->name('tarif.update');
Route::delete('/tarif/{tarif}', [TarifController::class, 'destroy'])->name('tarif.destroy');


//tagihan
route::resource('tagihan', TagihanController::class);
route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan.index');
route::post('/tagihan/create', [TagihanController::class, 'create'])->name('tagihan.create');
route::post('/tagihan', [TagihanController::class, 'store'])->name('tagihan.store');
Route::put('/tagihan/update-status/{tagihan}', [TagihanController::class, 'update'])->name('tagihan.update');
Route::delete('/tagihan/delete/{tagihan}', [TagihanController::class, 'destroy'])->name('tagihan.destroy');
Route::post('/check-tagihan', [TagihanController::class, 'checkTagihan'])->name('tagihan.checkTagihan');


