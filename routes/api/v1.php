<?php

use App\Http\Controllers\HolyCardController;
use App\Http\Controllers\HolyCardReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {

  Route::prefix('holycards')->group(function () {

    Route::get('/', [HolyCardController::class, 'index']);
    Route::get('/{holyCard}', [HolyCardController::class, 'show']);
    Route::get('/{holyCard}/reservations', [HolyCardController::class, 'showHolyCardReservations']);
  });

  Route::prefix('users')->group(function () {

    Route::get('/{user}', [UserController::class, 'show']);
    Route::get('/{user}/reservations', [UserController::class, 'showUserReservations']);
  });

  Route::prefix('reservations')->group(function () {

    Route::get('/', [HolyCardReservationController::class, 'index']);
  });
});
