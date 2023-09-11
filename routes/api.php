<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Public Login
Route::post('/userLogin', [App\Http\Controllers\Application\AppController::class, 'login']);

// protected
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/userLogout', [App\Http\Controllers\Application\AppController::class, 'logout']);
    Route::get('/roomGet', [App\Http\Controllers\Application\AppController::class, 'roomGetAll']);
    Route::get('/getRoomType', [App\Http\Controllers\Application\AppController::class, 'getRoomType']);
    Route::get('/bookingGet', [App\Http\Controllers\Application\AppController::class, 'bookingGetAll']);
    Route::get('/getStaffs', [App\Http\Controllers\Application\AppController::class, 'staffGetAll']);
    Route::post('/AddRoom', [App\Http\Controllers\Application\AppController::class, 'storeRoom']);
    Route::post('/AddBooking', [App\Http\Controllers\Application\AppController::class, 'storeBooking']);
});
