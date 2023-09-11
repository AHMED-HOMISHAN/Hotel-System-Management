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
Route::get('/',[App\Http\Controllers\Dashboard\RoomsController::class, 'index'], )->name('rooms.index');
Route::get('/add',[App\Http\Controllers\Dashboard\RoomsController::class, 'addRooms'], )->name('rooms.add');
Route::POST('/edit',[App\Http\Controllers\Dashboard\RoomsController::class, 'edit'], )->name('rooms.edit');
Route::get('/modify/{id}',[App\Http\Controllers\Dashboard\RoomsController::class, 'modify'], )->name('rooms.modify');
Route::delete('/delete',[App\Http\Controllers\Dashboard\RoomsController::class, 'delete'], )->name('rooms.delete');
Route::POST('/store',[App\Http\Controllers\Dashboard\RoomsController::class, 'store'], )->name('rooms.store');
//price
Route::get('/price/add',[App\Http\Controllers\HomeController::class, 'add'], )->name('home.add');
Route::POST('/price/store',[App\Http\Controllers\HomeController::class, 'store'], )->name('home.store');
    });
