<?php

use App\Http\Controllers\Item\ItemController;
use Illuminate\Support\Facades\Route;

Route::resource('item', ItemController::class);
