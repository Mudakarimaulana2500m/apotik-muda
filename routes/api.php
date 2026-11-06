<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApotikController;

// API Obat
Route::get('/obat', [ApotikController::class, 'apiObatIndex']);
Route::post('/obat', [ApotikController::class, 'apiObatStore']);
Route::put('/obat/{id}', [ApotikController::class, 'apiObatUpdate']);
Route::delete('/obat/{id}', [ApotikController::class, 'apiObatDestroy']);

// API Pelanggan
Route::get('/pelanggan', [ApotikController::class, 'apiPelangganIndex']);
Route::post('/pelanggan', [ApotikController::class, 'apiPelangganStore']);
Route::put('/pelanggan/{id}', [ApotikController::class, 'apiPelangganUpdate']);
Route::delete('/pelanggan/{id}', [ApotikController::class, 'apiPelangganDestroy']);

// API Staf Apotek
Route::get('/staf', [ApotikController::class, 'apiStafIndex']);
Route::post('/staf', [ApotikController::class, 'apiStafStore']);
Route::put('/staf/{id}', [ApotikController::class, 'apiStafUpdate']);
Route::delete('/staf/{id}', [ApotikController::class, 'apiStafDestroy']);