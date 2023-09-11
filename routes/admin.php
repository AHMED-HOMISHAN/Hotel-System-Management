<?php

use Illuminate\Support\Facades\Route;


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

Route::middleware('auth')->group(
    function () {

        Route::get('/index', [App\Http\Controllers\Dashboard\IndexController::class, 'index'],)->name('dashboard.index');
        Route::get('/logout', [App\Http\Controllers\Dashboard\IndexController::class, 'userLogout'],)->name('dashboard.logout');
        Route::get('/profile', [App\Http\Controllers\Dashboard\IndexController::class, 'profile'],)->name('dashboard.profile');
        Route::POST('/update', [App\Http\Controllers\Dashboard\IndexController::class, 'edit'],)->name('dashboard.profile.update');
    }
);
