<?php

use App\Http\Controllers\Treasure\DeliveryTreasureController;
use Illuminate\Support\Facades\Route;

Route::get('/treasure/{treasure}/delivery-treasure/create', [DeliveryTreasureController::class, "create"])->name('delivery.treasure.create');
Route::post('/treasure/{treasure}/delivery-treasure', [DeliveryTreasureController::class, "store"])->name('delivery.treasure.store');
Route::get('/treasure/{treasure}/delivery-treasure/{deliveryTreasure}', [DeliveryTreasureController::class, "edit"])->name('delivery.treasure.edit');
Route::put('/treasure/{treasure}/delivery-treasure/{deliveryTreasure}', [DeliveryTreasureController::class, "update"])->name('delivery.treasure.update');
Route::delete('/treasure/{treasure}/delivery-treasure/{deliveryTreasure}', [DeliveryTreasureController::class, "destroy"])->name('delivery.treasure.destroy');
