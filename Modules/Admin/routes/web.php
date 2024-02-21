<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\App\Http\Controllers\AdminHomeController;
use Modules\Admin\App\Http\Controllers\Auth\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/****************************** Admin Routes * ***********/

/**
* Public Routes For Admin
 */
Route::prefix('admin/dashboard/')->name('admin.dashboard.')->group(function () {
    Route::get('home', [AdminHomeController::class, 'index'])->name('home')->middleware('auth:admin');
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login');
    Route::get('register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AdminAuthController::class, 'register'])->name('register');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

});

/**
 * Protected Routes
 */

Route::middleware('auth:admin')
    ->prefix("admin/dashboard/")
    ->name("admin.dashboard.")
    ->group(function (){
    Route::get("providers", [AdminHomeController::class , "showProvidersPage"])->name("providers");

});

/******************************* End Admin Routes* **********/
