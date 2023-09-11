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
    function (){
Route::get('/',[App\Http\Controllers\Dashboard\BookingsController::class, 'index'], )->name('bookings.index');
Route::get('/add',[App\Http\Controllers\Dashboard\BookingsController::class, 'addBooking'], )->name('bookings.add');
Route::get('/edit',[App\Http\Controllers\Dashboard\BookingsController::class, 'editBooking'], )->name('bookings.edit');
Route::POST('/edit',[App\Http\Controllers\Dashboard\BookingsController::class, 'edit'], )->name('bookings.edit');
Route::POST('/store',[App\Http\Controllers\Dashboard\BookingsController::class, 'store'], )->name('bookings.store');
Route::get('/modify/{id}',[App\Http\Controllers\Dashboard\BookingsController::class, 'modify'], )->name('bookings.modify');
Route::delete('/delete',[App\Http\Controllers\Dashboard\BookingsController::class, 'delete'], )->name('bookings.delete');
    });
