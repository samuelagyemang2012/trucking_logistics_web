<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
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

Route::get('/auth/google/redirect', [AuthController::class, 'googleRedirect'])->name('google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'googleCallback'])->name('google.callback');
// ---------end Auth----------------

// Company routes
Route::group(['prefix' => 'company', 'middleware' => ['auth', 'check_company']], function () {
    Route::get('/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard');
    Route::get('/profile', [CompanyController::class, 'showProfile'])->name('company.profile');
});

//Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check_admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/change-password', [AdminController::class, 'showChangePassword'])->name('admin.show.password.change');
    Route::post('/change-password', [AdminController::class, 'changePassword'])->name('admin.password.change');
    Route::get('/users/companies', [UserController::class, 'getCompanies'])->name('admin.users.companies');
    Route::get('/users/customers', [UserController::class, 'getCustomers'])->name('admin.users.customers');
    Route::get('/users/admins', [UserController::class, 'getAdmins'])->name('admin.users.admins');
});

// Route::get('/profile', function () {
//     return view('company/profile');
// });

// Route::get('/vehicles/all', function () {
//     return view('company/vehicles/all');
// });

// Route::get('/vehicles/add', function () {
//     return view('company/vehicles/bulk_add');
// });

// Route::get('/drivers/all', function () {
//     return view('company/drivers/all');
// });

// Route::get('/drivers/add', function () {
//     return view('company/drivers/bulk_add');
// });

// Route::get('/test', function () {

//     try {
//         Mail::raw('Test email', function ($message) {
//             $message->to('khermz2012@gmail.com')->subject('Test Email');
//         });
//     } catch (\Exception $e) {
//         dd($e->getMessage());
//     }
// });
