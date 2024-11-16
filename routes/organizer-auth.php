<?php

use App\Http\Controllers\Organizer\Auth\LoginController;
use App\Http\Controllers\Organizer\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('organizer')->middleware('guest:organizer')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('organizer.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('organizer.login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::prefix('organizer')->middleware('auth:organizer')->group(function () {

    
    Route::get('/dashboard', function () {
        return view('organizer.dashboard');
    })->name('organizer.dashboard');
    
    Route::post('logout', [LoginController::class, 'destroy'])->name('organizer.logout');
});
