<?php

use App\Http\Controllers\AccountType\AccountTypeController;
use Illuminate\Support\Facades\Route;

Route::resource('account-type', AccountTypeController::class);
