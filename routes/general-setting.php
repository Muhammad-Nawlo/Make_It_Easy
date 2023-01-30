<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\GeneralSetting\GeneralSettingController;
use Illuminate\Support\Facades\Route;

Route::get('general-setting', [GeneralSettingController::class, 'index'])->name('general-setting.index');
Route::get('general-setting/edit', [GeneralSettingController::class, 'edit'])->name('general-setting.edit');
Route::put('general-setting', [GeneralSettingController::class, 'update'])->name('general-setting.update');
