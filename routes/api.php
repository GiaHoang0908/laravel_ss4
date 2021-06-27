<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\SalesInvoiceController;
use App\Http\Controllers\api\DetailSalesInvoiceController;
use App\Http\Controllers\api\Product;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('Product', Product::class)->except('create', 'edit');
Route::resource('SalesInvoice', SalesInvoiceController::class)->except('create', 'edit');
Route::resource('DetailSalesInvoice', DetailSalesInvoiceController::class)->except('create', 'edit');