<?php

use App\Http\Controllers\Store\StoreController;
use Illuminate\Support\Facades\Route;

Route::resource('store', StoreController::class);
