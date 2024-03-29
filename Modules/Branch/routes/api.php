<?php

use Illuminate\Support\Facades\Route;
use Modules\Branch\App\Http\Controllers\Api\BranchController;

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

Route::middleware('auth:provider-api')->prefix('v1/')->name('api.v1.')->group(function () {
    Route::post('branches', [BranchController::class, 'store'])->name('branches.store');
});
