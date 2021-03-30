<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\CustomerDetailsController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\OrderApiController;


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

// Route::get('all', [UserController::class, 'index']);

//Products
Route::post('my-products', [ProductsController::class, 'index']);

Route::get('products', [ProductsController::class, 'allproducts']);
Route::get('product-list', [ProductsController::class,'category']);
Route::get('products/list', [ProductsController::class,'productList']);
Route::get('category/down', [ProductsController::class,'productCategory']);
Route::get('categories', [ProductsController::class,'allCategories']);
Route::get('products/count', [ProductsController::class,'countTotalProduct']);

//Customer
Route::post('customers/save', [CustomerDetailsController::class, 'store']);
Route::get('customers/get', [CustomerDetailsController::class, 'getCustomerInfo']);

//Cart
Route::post('cart/save', [CartController::class, 'store']);
Route::post('cart/edit', [CartController::class, 'update']);
Route::post('cart/remove', [CartController::class, 'remove']);
Route::post('cart/clear', [CartController::class, 'clear_cart']);
Route::get('cart/get', [CartController::class, 'getCart']);

//Order
Route::post('order/save', [OrderApiController::class, 'store']);
