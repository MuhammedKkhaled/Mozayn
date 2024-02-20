<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Provider\App\Http\Controllers\Api\ProviderAuthController;

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

/**************************** Provider Routes************/

Route::prefix('v1')->name('api.v1')->group(function () {
    Route::post('provider-Registration', [ProviderAuthController::class, 'register']);
    Route::post('provider-login', [ProviderAuthController::class, 'login']);
    Route::post('provider-logout', [ProviderAuthController::class, 'logout'])->middleware('auth:sanctum');

});

/****************************End Provider Routes************/

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('provider', fn (Request $request) => $request->user())->name('provider');
});
