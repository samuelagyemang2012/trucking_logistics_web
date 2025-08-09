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

Route::get('/fleet/all', function () {
    return view('company/fleet/all');
});

Route::get('/fleet/add', function () {
    return view('company/fleet/bulk_add');
});

