<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Staffs Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(
    function (){
        Route::get('/index',[App\Http\Controllers\Dashboard\StaffController::class,'index'])->name('staffs.index');
        Route::get('/modify/{id}/',[App\Http\Controllers\Dashboard\StaffController::class,'modify'])->name('staffs.modify');
        Route::POST('/edit',[App\Http\Controllers\Dashboard\StaffController::class,'edit'])->name('staffs.edit');
        Route::POST('/activate',[App\Http\Controllers\Dashboard\StaffController::class,'activate'])->name('staffs.activate');
        Route::POST('/delete',[App\Http\Controllers\Dashboard\StaffController::class,'delete'])->name('staffs.delete');
        Route::POST('/To',[App\Http\Controllers\Dashboard\StaffController::class,'To'])->name('staffs.To');
    }
);

?>
