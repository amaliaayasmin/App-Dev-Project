<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ShowController;



Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\DB;

Route::get('/pro', [FeedController::class, 'index'])->name('feed');

Route::middleware(['auth', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/dashboard/search', [DashboardController::class, 'search'])->name('dashboard.search');
});

Route::resource('post', PostController::class);

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
require __DIR__.'/organizer-auth.php';

Route::get('/admin/dashboard', [ShowController::class, 'show'])->name('admin.dashboard');
Route::get('/feed', [FeedController::class, 'index'])->name('feed.index');
//Route::get('/feed/search', [FeedController::class, 'index'])->name('feed.search');
Route::get('/feed/search', [PostController::class, 'search'])->name('feed.search');
//Route::get('/feed', [FeedController::class, 'index'])->name('feed.index');

