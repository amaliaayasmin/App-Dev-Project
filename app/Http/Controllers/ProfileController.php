<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
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

                // Delete the old file
                Storage::delete($oldImagePath);

                // Storage::delete('public/' . $user->profile_image);
            }

            $image = $request->file('profile_image');

            // Generate the file name and store the file
            $imageName = $image->getClientOriginalName(); // Get the original file name
            $imagePath = $image->storeAs('profile_images', $imageName, 'public'); // Store the file in 'public/profile_images'

            // Save the file name (relative path) in the database
            $user->profile_image = 'profile_images/' . $imageName; // Save only the file name, relative to 'public/storage'
            $user->save();
        }

        // Update other fields
        // $user->fill($request->validated());
        $user->university = $request->input('university');
        $user->faculty = $request->input('faculty');
        $user->languages = $request->input('languages');
        $user->location = $request->input('location');
        $user->experience = $request->input('experience');

        // Mark email as unverified if it has been changed
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Save the updated user information
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
