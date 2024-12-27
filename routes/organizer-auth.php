<?php

use App\Http\Controllers\Organizer\Auth\LoginController;
use App\Http\Controllers\Organizer\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\OrganizerProfileController;
use Illuminate\Support\Facades\Route;use App\Http\Controllers\PostController; 
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\NotificationController;


Route::prefix('organizer')->middleware('guest:organizer')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('organizer.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('organizer.login');
    Route::post('login', [LoginController::class, 'store']);

});

Route::prefix('organizer')->middleware('auth:organizer')->group(function () {


    Route::get('/dashboard', [OrganizerProfileController::class, 'dashboard'])->name('organizer.dashboard');

    
    Route::get('organizer/profile', [OrganizerProfileController::class, 'edit'])->name('organizer.profile.edit');
    Route::patch('organizer/profile', [OrganizerProfileController::class, 'update'])->name('organizer.profile.update'); // Ensure this route exists

    Route::delete('/profile', [OrganizerProfileController::class, 'destroy'])->name('organizer.profile.destroy');
    Route::get('/profile', [OrganizerProfileController::class, 'edit'])->name('organizer.profile.edit');
    Route::patch('/profile', [OrganizerProfileController::class, 'update'])->name('organizer.profile.update');
    Route::put('password', [PasswordController::class, 'update'])->name('organizer.password.update');
    Route::resource('post', PostController::class);
    Route::post('logout', [LoginController::class, 'destroy'])->name('organizer.logout');

    Route::post('/apply/{post}', [ApplyController::class, 'store'])->name('apply.store');
    Route::get('/organizer/applicants', [PostController::class, 'viewApplicants'])->name('post.applicants');
    Route::get('/my-applications', [ApplicationController::class, 'index'])->name('applications.index');

    Route::post('/post/{postId}/applicant/{applicantId}/accept', [PostController::class, 'accept'])->name('post.accept');
    Route::post('/post/{postId}/applicant/{applicantId}/send-message', [PostController::class, 'sendMessage'])->name('post.sendMessage');
});
