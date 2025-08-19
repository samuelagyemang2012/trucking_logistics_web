<?php

use App\Http\Controllers\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//public routes
Route::get('/', [ApiAuthController::class, 'index']);
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/test', [ApiAuthController::class, 'test']);

//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/activate_account', [ApiAuthController::class, 'activateAccount']);
    Route::post('/new_otp', [ApiAuthController::class, 'newOTP']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

Route::post('/test', [ApiAuthController::class, 'test']);
