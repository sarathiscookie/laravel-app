<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelContactController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route for login
Route::post('login', [AuthController::class, 'login'])->name('login');

// Route groups
Route::middleware(['auth:sanctum'])->group(function () {

    Route::apiResources([
        'users' => UserController::class,
        'hotels' => HotelController::class
    ]);

    Route::apiResource('hotels.contacts', HotelContactController::class)->except('show')
    ->shallow();

    Route::apiResource('hotels.roomtypes', RoomTypeController::class)->shallow();

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
