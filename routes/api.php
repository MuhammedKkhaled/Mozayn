<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\Auth\UserAuthController;
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

/************************** Product  Routes ***************/
/// public Routes
Route::get('products', [ProductController::class, 'index']);
Route::post('v1/register', [UserAuthController::class, 'register'])->name('api.v1.register');

/// Private Routes
Route::middleware('auth:sanctum')->prefix('v1/')->name('api.')->group(function () {
    Route::post('products', [ProductController::class, 'create']);
});

/************************** Product  Routes ***************/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
