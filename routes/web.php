<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

// later create a group for company routes

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

Route::get('/drivers/all',function(){
     return view('company/drivers/all');
});

Route::get('/drivers/add',function(){
     return view('company/drivers/bulk_add');
});

