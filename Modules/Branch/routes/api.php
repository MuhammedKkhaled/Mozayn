<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Branch\App\Http\Controllers\BranchController;

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

Route::prefix('v1/')->name('api.v1.')->group(function () {
    Route::post('branches', [BranchController::class, 'store'])->name('branches.store');
});
Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('branch', fn (Request $request) => $request->user())->name('branch');
});
