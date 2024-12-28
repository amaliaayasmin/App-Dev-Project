<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage; // Import Storage facade
use Illuminate\View\View;
use Illuminate\Support\Facades\Log; 
use App\Models\Post;


class OrganizerProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('Organizer.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
    
        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Delete old profile image if it exists
            if ($user->profile_image) {
                $oldImagePath = 'public/' . $user->profile_image;
                Storage::delete($oldImagePath);
            }
    
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Use a unique name
            $imagePath = $image->storeAs('profile_images', $imageName, 'public'); // Store the file
    
            // Save the file name (relative path) in the database
            $user->profile_image = 'profile_images/' . $imageName; // Save only the file name
        }
    
        // Handle header image upload
        if ($request->hasFile('header_image')) {
            // Delete old header image if it exists
            if ($user->header_image) {
                $oldImagePath = 'public/' . $user->header_image;
                Storage::delete($oldImagePath);
            }
    
            $image = $request->file('header_image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Use a unique name
            $imagePath = $image->storeAs('header_images', $imageName, 'public'); // Store the file
    
            // Save the file name (relative path) in the database
            $user->header_image = 'header_images/' . $imageName; // Save only the file name
        }
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->year_established = $request->input('year_established');
        $user->description = $request->input('description');
    
        // Mark email as unverified if it has been changed
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        // Log the user object before saving
        Log::info('User  before save:', $user->toArray());
    
        // Save the updated user information
        if ($user->save()) {
            return Redirect::route('organizer.profile.edit')->with('status', 'profile-updated');
        } else {
            return Redirect::route('organizer.profile.edit')->with('error', 'Failed to update profile.');
        }
    }

    public function dashboard(): View
    {
        // Fetch the logged-in organizer
        $user = Auth::user();

        // Fetch all posts created by the organizer
        $posts = Post::where('organizer_id', $user->id)->get(); // Assuming you have an organizer_id field in your posts

        // Count the number of posts
        $postCount = $posts->count();

        // Get today's date
        $today = now()->toDateString();

        // Count past and upcoming posts
        $pastCount = $posts->filter(function ($post) use ($today) {
            return $post->end_date < $today; // Count posts that have ended
        })->count();

        $upcomingCount = $posts->filter(function ($post) use ($today) {
            return $post->start_date >= $today; // Count posts that are upcoming
        })->count();

        return view('Organizer.dashboard', [
            'user' => $user,
            'posts' => $posts,
            'postCount' => $postCount,
            'pastCount' => $pastCount,
            'upcomingCount' => $upcomingCount,
        ]);
    }

    public function show($id)
    {
        // Fetch the organizer by ID
        $organizer = Organizer::findOrFail($id);

        // Return the view with the organizer's details
        return view('Organizer.show', compact('organizer'));
    }
    
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}