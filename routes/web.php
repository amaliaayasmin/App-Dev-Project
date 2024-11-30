<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\ApplicationController;

Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\DB;

Route::get('/feed', [FeedController::class, 'index'])->name('feed');

Route::middleware(['auth', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/dashboard/search', [DashboardController::class, 'search'])->name('dashboard.search');
});

Route::resource('post', PostController::class);

Route::get('/admin/dashboard', action: [ShowController::class, 'show'])->name('admin.dashboard');
Route::get('/organizer/dashboard', action: [ShowController::class, 'show'])->name('organizer.dashboard');


//Route::get('/feed/search', [FeedController::class, 'index'])->name('feed.search');
Route::get('/feed/search', [PostController::class, 'search'])->name('feed.search');
//Route::get('/feed', [FeedController::class, 'index'])->name('feed.index');

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
require __DIR__.'/organizer-auth.php';

Route::post('/apply/{post}', [ApplyController::class, 'store'])->name('apply.store');
Route::get('/organizer/posts/{post}/applicants', [PostController::class, 'viewApplicants'])->name('post.applicants');
Route::get('/my-applications', [ApplicationController::class, 'index'])->name('applications.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
});
