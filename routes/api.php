<?php

use App\Http\Controllers\Api\Account\AccountController;
use App\Http\Controllers\Api\Account\CustomerController;
use App\Http\Controllers\Api\AccountType\AccountTypeController;
use App\Http\Controllers\Api\Address\AddressController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\InvoiceType\InvoiceTypeController;
use App\Http\Controllers\Api\Item\ItemController;
use App\Http\Controllers\Api\Store\StoreController;
use App\Http\Controllers\Api\SupplierCategory\SupplierCategoryController;
use App\Http\Controllers\Api\Treasure\DeliveryTreasureController;
use App\Http\Controllers\Api\Treasure\TreasureController;
use App\Http\Controllers\Api\Unit\UnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/treasure', [TreasureController::class, "index"])->name('api.treasure.index');
Route::get('/treasure/{treasure}/delivery-treasure', [DeliveryTreasureController::class, "index"])->name('api.treasure.delivery.index');
Route::get('/invoice-type', [InvoiceTypeController::class, "index"])->name('api.invoice-type.index');
Route::get('/category', [CategoryController::class, "index"])->name('api.category.index');
Route::get('/supplier-category', [SupplierCategoryController::class, "index"])->name('api.supplier.category.index');
Route::get('/store', [StoreController::class, "index"])->name('api.store.index');
Route::get('/unit', [UnitController::class, "index"])->name('api.unit.index');
Route::get('/secondary-unit', [UnitController::class, "secondaryUnit"]);
Route::get('/item', [ItemController::class, "index"])->name('api.item.index');
Route::get('/account-type', [AccountTypeController::class, "index"])->name('api.account.type.index');
Route::get('/account', [AccountController::class, "index"])->name('api.account.index');
Route::get('/customer', [CustomerController::class, "index"])->name('api.customer.index');
Route::get('/country', [AddressController::class, "country"])->name('api.address.country');
Route::get('/city', [AddressController::class, "city"])->name('api.address.city');
Route::get('/state', [AddressController::class, "state"])->name('api.address.state');
