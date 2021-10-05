<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

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

//View
//Route::get('products', [ProductController::class, 'index']);
//Route::get('products/{product}', [ProductController::class, 'show']);
//
////ADD
//Route::post('products', [ProductController::class, 'store']);  // no work
//
////Delete, Update
//
//Route::put('products/{product}', [ProductController::class, 'update']);     // hz
//Route::delete('products/{product}', [ProductController::class, 'destroy']);   //work

//apiresource
Route::apiResource('products', ProductController::class);

////USER
Route::apiResource('users', UserController::class);   // (не знаю зачем, если будет время, сделаю авторизацию)

///action
//Route::get('action', [ProductController::class, 'action']);  (засунул в продукты)

Route::post('products/create', [ProductController::class, 'create']);


