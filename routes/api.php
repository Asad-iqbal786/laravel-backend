<?php

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
Route::get('all-products', 'App\Http\Controllers\Api\ProductController@allProductApi');
Route::post('store-product', 'App\Http\Controllers\Api\ProductController@storeProduct');
Route::get('edit-product/{id}', 'App\Http\Controllers\Api\ProductController@editProduct');
Route::post('edit-store-product/{id}', 'App\Http\Controllers\Api\ProductController@editStoreProduct');
Route::delete('delete-product/{id}', 'App\Http\Controllers\Api\ProductController@deleteProduct');
Route::get('product-detail/{id}', 'App\Http\Controllers\Api\ProductController@productDetail');

