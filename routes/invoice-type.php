<?php

use App\Http\Controllers\InvoiceType\InvoiceTypeController;
use Illuminate\Support\Facades\Route;

Route::resource('invoice-type', InvoiceTypeController::class);
