<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| customers Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth')->group(
    function (){
        Route::get('/index',[App\Http\Controllers\Dashboard\CustomersController::class,'index'])->name('customers.index');
    }
);
