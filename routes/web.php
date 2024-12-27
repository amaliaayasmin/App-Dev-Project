<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\OrganizerProfileController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\SavedProgramController;
use App\Http\Controllers\OverviewController;
<<<<<<< Updated upstream
<<<<<<< Updated upstream
use App\Http\Controllers\AboutController;

=======
use App\Http\Controllers\NotificationController;
>>>>>>> Stashed changes
=======
use App\Http\Controllers\NotificationController;
>>>>>>> Stashed changes

Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/admin/dashboard', [ShowController::class, 'showController'])->name('admin.dashboard');
// Route::post('/admin/addUser', [ShowController::class, 'addUser'])->name('admin.add-user');
//Route::get('/organizer/dashboard', action: [ShowController::class, 'show'])->name('organizer.dashboard');

//Profile Update 
/*Route::middleware(['auth:organizer'])->group(function () {
    Route::get('organizer/profile', [OrganizerProfileController::class, 'edit'])->name('organizer.profile.edit');
    Route::patch('organizer/profile', [OrganizerProfileController::class, 'update'])->name('organizer.profile.update'); // Ensure this route exists
    Route::get('/organizer/{id}', [OrganizerProfileController::class, 'show'])->name('organizer.show');
});*/

//Route::get('/feed/search', [FeedController::class, 'index'])->name('feed.search');
Route::get('/feed/search', [PostController::class, 'search'])->name('feed.search');
//Route::get('/feed', [FeedController::class, 'index'])->name('feed.index');

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
require __DIR__.'/organizer-auth.php';

Route::post('/apply/{post}', [ApplyController::class, 'store'])->name('apply.store');
Route::get('/organizer/posts/{post}/applicants', [PostController::class, 'viewApplicants'])->name('post.applicants');
Route::get('/my-applications', [ApplicationController::class, 'index'])->name('applications.index');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::get('/organizer/{id}', [OrganizerProfileController::class, 'show'])->name('organizer.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/programs', [PostController::class, 'index'])->name('programs.index');
    Route::post('/post/{postId}/applicant/{applicantId}/accept', [PostController::class, 'accept'])->name('post.accept');

});




Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
Route::post('/post/{postId}/applicant/{applicantId}/accept', [PostController::class, 'accept'])->name('post.accept');
Route::post('/post/{postId}/applicant/{applicantId}/reject', [PostController::class, 'reject'])->name('post.reject');

Route::get('/savedprograms', [SavedProgramController::class, 'index'])->name('savedprograms.index');
Route::post('/bookmark', [SavedProgramController::class, 'toggleBookmark'])->name('bookmark');
Route::post('/unsave', [SavedProgramController::class, 'unsave'])->name('post.unsave');
Route::post('/toggle-bookmark/{feed}', [SavedProgramController::class, 'toggle'])->name('toggle.bookmark');

<<<<<<< Updated upstream
<<<<<<< Updated upstream
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
=======
=======
>>>>>>> Stashed changes
Route::get('/notifications', [NotificationController::class, 'index'])->middleware('auth')->name('notifications.index');


//Route::post('/post/{postId}/applicant/{applicantId}/accept', [PostController::class, 'accept'])->name('post.accept');
<<<<<<< Updated upstream
//Route::post('/post/{postId}/applicant/{applicantId}/send-message', [PostController::class, 'sendMessage'])->name('post.sendMessage');
>>>>>>> Stashed changes
=======
//Route::post('/post/{postId}/applicant/{applicantId}/send-message', [PostController::class, 'sendMessage'])->name('post.sendMessage');
>>>>>>> Stashed changes
