<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProgramController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pro', [App\Http\Controllers\ProgramController::class, 'index'])->name('feed');


Route::middleware(['auth', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/dashboard/search', [DashboardController::class, 'search'])->name('dashboard.search');
    Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
    //Route::get('/feeds/{feeds}', [FeedController::class, 'show'])->name('post.show');
    

});

Route::resource('post', PostController::class);

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';

