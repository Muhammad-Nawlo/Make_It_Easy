<?php

use App\Http\Controllers\Treasure\TreasureController;
use App\Http\Controllers\Treasure\TreasureStatusController;
use App\Http\Controllers\Treasure\TreasureTypeController;
use Illuminate\Support\Facades\Route;

Route::get('treasure', [TreasureController::class, 'index'])->name('treasure.index');
Route::get('treasure/create', [TreasureController::class, 'create'])->name('treasure.create');
Route::post('treasure', [TreasureController::class, 'store'])->name('treasure.store');
Route::get('treasure/type', [TreasureTypeController::class, "__invoke"])->name('treasure.type');
Route::get('treasure/status', [TreasureStatusController::class, "__invoke"])->name('treasure.status');
Route::get('treasure/{treasure}', [TreasureController::class, 'show'])->name('treasure.show');
Route::get('treasure/{treasure}/edit', [TreasureController::class, 'edit'])->name('treasure.edit');
Route::put('treasure/{treasure}', [TreasureController::class, 'update'])->name('treasure.update');
Route::delete('treasure/{treasure}', [TreasureController::class, 'destroy'])->name('treasure.destroy');

