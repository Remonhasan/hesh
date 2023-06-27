<?php

use Illuminate\Support\Facades\Route;
use Remonhasan\Hesh\Http\Controllers\AdminController;

Route::group(['namespace' => 'Remonhasan\Hesh\Http\Controllers'], function () {

    // Admin Register
    Route::get('/admin-register', [AdminController::class, 'registerForm'])->name('register.form');
    Route::post('/register/create', [AdminController::class, 'register'])->name('admin.register');

    // Admin Login
    Route::get('/admin-login', [AdminController::class, 'loginForm'])->name('login.form');
    Route::post('/login/owner', [AdminController::class, 'login'])->name('admin.login');

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

});


