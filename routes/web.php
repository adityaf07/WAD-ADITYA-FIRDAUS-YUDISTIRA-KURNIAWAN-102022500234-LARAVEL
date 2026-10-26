<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;

Route::get('/', fn () => redirect()->route('pelanggan.index'));
Route::resource('pelanggan', PelangganController::class)->except(['show']);
