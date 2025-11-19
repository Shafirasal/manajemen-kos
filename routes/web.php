<?php

use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\TipeKamarController;
use App\Http\Controllers\TransaksiSewaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.template');
});


    Route::prefix('penyewa')->name('penyewa.')->group(function () {
        Route::post('/list', [PenyewaController::class, 'list']);
        Route::get('/', [PenyewaController::class, 'index']);
        Route::get('/create', [PenyewaController::class, 'create']);
        Route::post('/store', [PenyewaController::class, 'store']);
        Route::get('/{id}/show', [PenyewaController::class, 'show']);
        Route::get('/{id}/edit', [PenyewaController::class, 'edit']);
        Route::put('/{id}/update', [PenyewaController::class, 'update']);
        Route::get('/{id}/confirm', [PenyewaController::class, 'confirm']);
        Route::delete('/{id}/delete', [PenyewaController::class, 'delete']);
    });

        Route::prefix('tipe_kamar')->name('tipe_kamar.')->group(function () {
        Route::post('/list', [TipeKamarController::class, 'list']);
        Route::get('/', [TipeKamarController::class, 'index']);
        Route::get('/create', [TipeKamarController::class, 'create']);
        Route::post('/store', [TipeKamarController::class, 'store']);
        Route::get('/{id}/show', [TipeKamarController::class, 'show']);
        Route::get('/{id}/edit', [TipeKamarController::class, 'edit']);
        Route::put('/{id}/update', [TipeKamarController::class, 'update']);
        Route::get('/{id}/confirm', [TipeKamarController::class, 'confirm']);
        Route::delete('/{id}/delete', [TipeKamarController::class, 'delete']);
    });

        Route::prefix('kamar')->name('kamar.')->group(function () {
        Route::post('/list', [KamarController::class, 'list']);
        Route::get('/', [KamarController::class, 'index']);
        Route::get('/create', [KamarController::class, 'create']);
        Route::post('/store', [KamarController::class, 'store']);
        Route::get('/{id}/show', [KamarController::class, 'show']);
        Route::get('/{id}/edit', [KamarController::class, 'edit']);
        Route::put('/{id}/update', [KamarController::class, 'update']);
        Route::get('/{id}/confirm', [KamarController::class, 'confirm']);
        Route::delete('/{id}/delete', [KamarController::class, 'delete']);
    });

        Route::prefix('transaksi_sewa')->name('transaksi_sewa.')->group(function () {
        Route::post('/list', [TransaksiSewaController::class, 'list']);
        Route::get('/', [TransaksiSewaController::class, 'index']);
        Route::get('/create', [TransaksiSewaController::class, 'create']);
        Route::post('/store', [TransaksiSewaController::class, 'store']);
        Route::get('/{id}/show', [TransaksiSewaController::class, 'show']);
        Route::get('/{id}/edit', [TransaksiSewaController::class, 'edit']);
        Route::put('/{id}/update', [TransaksiSewaController::class, 'update']);
        Route::get('/{id}/confirm', [TransaksiSewaController::class, 'confirm']);
        Route::delete('/{id}/delete', [TransaksiSewaController::class, 'delete']);
    });