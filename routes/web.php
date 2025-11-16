<?php

use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\TipeKamarController;
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