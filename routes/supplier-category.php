<?php

use App\Http\Controllers\SupplierCategory\SupplierCategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('supplier-category', SupplierCategoryController::class);
