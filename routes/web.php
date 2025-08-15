<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});



// -----------Auth------------------
Route::get('/register', [AuthController::class, 'showCompanyRegister'])->name('show.company.register');
Route::post('/register', [AuthController::class, 'companyRegister'])->name('company.register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// ---------end Auth----------------

// Company routes
Route::group(['prefix' => 'company', 'middleware' => ['auth', 'check_company']], function () {
    Route::get('/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard');
    Route::get('/profile', [CompanyController::class, 'showProfile'])->name('company.profile');
});


Route::get('/dashboard', function () {
    return view('company/dashboard');
});

Route::get('/profile', function () {
    return view('company/profile');
});

Route::get('/vehicles/all', function () {
    return view('company/vehicles/all');
});

Route::get('/vehicles/add', function () {
    return view('company/vehicles/bulk_add');
});

Route::get('/drivers/all', function () {
    return view('company/drivers/all');
});

Route::get('/drivers/add', function () {
    return view('company/drivers/bulk_add');
});

// Route::get('/test', function () {

//     try {
//         Mail::raw('Test email', function ($message) {
//             $message->to('khermz2012@gmail.com')->subject('Test Email');
//         });
//     } catch (\Exception $e) {
//         dd($e->getMessage());
//     }
// });
