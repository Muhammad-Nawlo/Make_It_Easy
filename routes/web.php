<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    require __DIR__ . '/general-setting.php';
    require __DIR__ . '/treasure.php';
    require __DIR__ . '/delivery-treasure.php';
    require __DIR__ . '/invoice-type.php';
    require __DIR__ . '/store.php';
    require __DIR__ . '/category.php';
    require __DIR__ . '/unit.php';
    require __DIR__ . '/item.php';
    require __DIR__ . '/account-type.php';
    require __DIR__ . '/account.php';
    require __DIR__ . '/supplier-category.php';
    require __DIR__ . '/customer.php';
});
