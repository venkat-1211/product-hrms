<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;

Route::middleware(['web'])->group(function () {
    // Superadmin login
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Company-specific login (with dynamic slug)
    Route::prefix('{company}')->group(function () {
        Route::get('/login', [AuthController::class, 'loginForm'])->name('company.login.form');
        Route::post('/login', [AuthController::class, 'login'])->name('company.login');
        Route::get('/logout', [AuthController::class, 'logout'])->name('company.logout');
        Route::get('/profile', [AuthController::class, 'profile'])->name('company.profile');
        Route::put('/profile-update/{user}', [AuthController::class, 'profileUpdate'])->name('company.profile.update');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', [AuthController::class, 'index'])->name('super-admin-dashboard');
        // test route
        Route::prefix('{company}')->group(function () {
            Route::get('/test', function () {
                return view('test');
            });
        });
        // Company-specific login (with dynamic slug)
        Route::prefix('{company}')->group(function () {
            Route::get('/dashboard', [AuthController::class, 'companyIndex'])->name('company.dashboard');
        });
        
    });
});
