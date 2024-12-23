<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\ShowController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Guest Routes (Admin Registration and Login)
Route::prefix('admin')->middleware('guest:admin')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);
});

// Authenticated Routes (Admin Dashboard and Organizer Management)
Route::prefix('admin')->middleware('auth:admin')->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', function () {
        // Fetch organizers data
        $organizers = \App\Models\Organizer::all(); // Assuming the Organizer model is in the App\Models namespace
        $user=User::all();
        return view('admin.dashboard',compact('organizers','user'));
        // return view('admin.dashboard', compact('organizers'));
    })->name('admin.dashboard');

    Route::get('/addUser',[ShowController::class, 'viewUser'])->name('view.user');
    Route::post('/addUser',[ShowController::class, 'addUser'])->name('add.user');
    Route::get('/addOrganizer',[ShowController::class, 'viewOrganizer'])->name('view.organizer');
    Route::post('/addOrganizer',[ShowController::class, 'addOrganizer'])->name('add.organizer');
    Route::get('/deleteOrganizer',[ShowController::class, 'deleteOrganizer'])->name('delete.organizer');
    Route::get('/deleteUser',[ShowController::class, 'deleteUser'])->name('delete.user');

    // Admin Logout
    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');
});

