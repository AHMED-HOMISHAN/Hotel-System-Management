<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


Route::middleware('guest')->group(function(){

    Route::get('/', function(){
        return view('auth.login');
      })->name('index');

  Route::get('/login','AuthController@showLoginForm')->name('login');
  Route::post('/login','AuthController@login');
});

Route::middleware('auth')->group(function(){

    Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'], )->name('home.index');

});


Auth::routes();

