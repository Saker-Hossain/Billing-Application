<?php

use App\Http\Controllers\Bill\BillingController;
use App\Http\Controllers\InventoriesController;
use App\Http\Controllers\InventoryProducts;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/billing', [BillingController::class, 'index']);
Route::resource('/inventoryProducts', InventoryProducts::class);
Route::resource('/inventories', InventoriesController::class);




//