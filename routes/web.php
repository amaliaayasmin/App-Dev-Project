<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

// Main Home Route
Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication Routes
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// Additional Page Routes
Route::get('/messages', function () {
    return view('messages'); // create messages.blade.php
})->name('messages');

Route::get('/calendar', function () {
    return view('calendar'); // create calendar.blade.php
})->name('calendar');

Route::get('/saved-events', function () {
    return view('saved-events'); // create saved-events.blade.php
})->name('saved.events');

Route::get('/profile', function () {
    return view('profile'); // create profile.blade.php
})->name('profile');
