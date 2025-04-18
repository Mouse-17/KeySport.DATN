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

// Route kiểm tra màu sắc và kích thước
Route::get('/check-mau-size', function() {
    $mau = \App\Models\MauSac::all();
    $size = \App\Models\Size::all();
    $sp_mau_size = \App\Models\SP_MauSize::with(['mau', 'size'])->get();
    
    return response()->json([
        'mau' => $mau,
        'size' => $size,
        'sp_mau_size' => $sp_mau_size
    ]);
});

// API endpoints để lấy thông tin màu và size từ ID
Route::get('/mau/{id}', function($id) {
    $mau = \App\Models\MauSac::find($id);
    return response()->json([
        'status' => 'success',
        'data' => $mau
    ]);
});

Route::get('/size/{id}', function($id) {
    $size = \App\Models\Size::find($id);
    return response()->json([
        'status' => 'success',
        'data' => $size
    ]);
});
