<?php

use App\Http\Controllers\Account\CustomerController;
use Illuminate\Support\Facades\Route;

Route::resource('customer', CustomerController::class);
