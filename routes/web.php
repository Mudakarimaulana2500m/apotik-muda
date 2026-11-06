<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApotikController;

Route::get('/', [ApotikController::class, 'indexWeb'])->name('home');

Route::post('/obat/store', [ApotikController::class, 'storeObat'])->name('obat.store');
Route::post('/pelanggan/store', [ApotikController::class, 'storePelanggan'])->name('pelanggan.store');
Route::post('/staf/store', [ApotikController::class, 'storeStaf'])->name('staf.store');

Route::delete('/obat/delete/{id}', [ApotikController::class, 'destroyObat'])->name('obat.destroy');
Route::delete('/pelanggan/delete/{id}', [ApotikController::class, 'destroyPelanggan'])->name('pelanggan.destroy');
Route::delete('/staf/delete/{id}', [ApotikController::class, 'destroyStaf'])->name('staf.destroy');