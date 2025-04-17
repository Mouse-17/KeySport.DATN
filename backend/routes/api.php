<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SanController;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products', ApiController::class);
Route::get('/san-pham-pho-bien', [ApiController::class, 'productView']);

Route::get('/san-pho-bien', [ApiController::class, 'popularYard']);

Route::get('/sanpham', [ProductController::class, 'showListProduct']);
Route::get('/sanpham/{id}', [ProductController::class, 'showdetail']);

Route::apiResource('san', SanController::class);
Route::get('/san', [SanController::class, 'showListYard']);
Route::get('/san/{id}', [SanController::class, 'show']);
