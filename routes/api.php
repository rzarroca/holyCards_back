<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::prefix('v1')->group(function () {
    require __DIR__.'/api/v1.php';
    require __DIR__.'/auth.php';
});

Route::fallback(function(){
    return response()->json([
        'message' => 'Resource not found. If error persists, contact zarroca@calimasolutions.com'], 404);
});
