<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/add-product', [ProductController::class, 'addProduct']);
Route::get('/all-products', [ProductController::class, 'productsList']);
Route::get('/product/{id}', [ProductController::class, 'product']);
Route::put('/update-product/{id}', [ProductController::class, 'updateProduct']);
Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProduct']);

