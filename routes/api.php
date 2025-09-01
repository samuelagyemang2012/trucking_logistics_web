<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Middleware\CheckAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//public routes
Route::get('/', [ApiAuthController::class, 'index']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class, 'register']);
Route::get('/auth/google/redirect', [GoogleController::class, 'googleRedirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'googleCallback'])->name('google.callback');

//protected routes
Route::group(['middleware' => ['auth:sanctum', 'check_api']], function () {
    Route::post('/activate_account', [ApiAuthController::class, 'activateAccount'])->withoutMiddleware('check_api');
    Route::post('/new_otp', [ApiAuthController::class, 'newOTP']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::get('/test', [ApiAuthController::class, 'test']); //->middleware('check_api');
    // Route::post('/test', [ApiAuthController::class, 'ptest']);//->middleware('check_api');
});
