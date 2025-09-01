<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
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

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('show.password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');
// ---------end Auth----------------

// Company routes
Route::group(['prefix' => 'company', 'middleware' => ['auth', 'check_company']], function () {
    Route::get('/dashboard', [CompanyController::class, 'dashboard'])->name('company.dashboard');
    // Profile
    Route::get('/profile', [CompanyController::class, 'showProfile'])->name('company.profile');
    Route::post('/profile-update', [UserController::class, 'update'])->name('company.profile.update');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('password.change');
    Route::post('/delete-account', [AuthController::class, 'deleteAccount'])->name('company.delete.account');

    // Vehicles
    Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
    Route::post('/vehicles/add', [VehicleController::class, 'add'])->name('vehicles.add');
    Route::get('/vehicles/add/bulk', [VehicleController::class, 'showBulkAdd'])->name('vehicles.add.bulk');
    Route::get('/vehicles/{id}', [VehicleController::class, 'get'])->name('vehicles.get');
    Route::post('/vehicles/update', [VehicleController::class, 'update'])->name('vehicles.update');
    Route::post('/vehicles/delete', [VehicleController::class, 'delete'])->name('vehicles.delete');

    // Drivers
    Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
    Route::post('/drivers/add', [DriverController::class, 'add'])->name('drivers.add');
    Route::get('/drivers/{id}', [DriverController::class, 'get'])->name('drivers.get');
});


//Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check_admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/deactivate-account', [AdminController::class, 'deactivateAccount'])->name('admin.deactivate.account');
    // Route::get('/change-password', [AdminController::class, 'showChangePassword'])->name('admin.show.password.change');
    // Route::post('/change-password', [AdminController::class, 'changePassword'])->name('admin.password.change');
    Route::get('/users/companies', [UserController::class, 'getCompanies'])->name('admin.users.companies');
    Route::get('/users/customers', [UserController::class, 'getCustomers'])->name('admin.users.customers');
    Route::get('/users/customers/{id}', [UserController::class, 'getCustomer'])->name('admin.users.customer');
    Route::get('/users/admins', [UserController::class, 'getAdmins'])->name('admin.users.admins');
    Route::post('/deactivate', [AdminController::class, 'deactivateUserCompany'])->name('admin.deactivate.account');
    Route::post('/deactivate-user-company', [AdminController::class, 'deactivateCustomerCompany'])->name('admin.deactivate.customer.company');
    Route::post('/activate-user-company', [AdminController::class, 'activateCustomerCompany'])->name('admin.activate.customer.company');
    Route::post('/delete-account', [AuthController::class, 'deleteAccount'])->name('admin.delete.account');
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
