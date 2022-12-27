<?php

use App\Http\Controllers\HolyCardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {

  Route::prefix('holycards')->group(function () {

    Route::get('/', [HolyCardController::class, 'index']);
    Route::get('/{holyCard}', [HolyCardController::class, 'show']);
  });
});
