<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavedProgram;
use App\Models\Post; // Adjust based on your model name
use Illuminate\Support\Facades\Auth;


class SavedProgramController extends Controller
{
    public function index()
    {
        // Fetch saved programs for the authenticated user
        $savedPrograms = SavedProgram::where('user_id', Auth::id())->with('post')->get();
        $bookmarkedPosts = $savedPrograms->pluck('post_id')->toArray();  // Get an array of post IDs that the user has bookmarked

        return view('savedprograms.index', compact('savedPrograms'));
    }

    public function toggleBookmark(Request $request)
    {
        $userId = Auth::id();
        $postId = $request->input('post_id');
        $bookmarked = $request->input('bookmarked');

        if ($bookmarked) {
            // Save bookmark
            SavedProgram::updateOrCreate(
                ['user_id' => $userId, 'post_id' => $postId]
            );
        } else {
            // Remove bookmark
            SavedProgram::where('user_id', $userId)->where('post_id', $postId)->delete();
        }

        return response()->json(['message' => $bookmarked ? 'Bookmarked' : 'Removed']);
    }

    public function showSavedPrograms()
{
    $userId = auth()->id(); // Get the authenticated user ID
    $savedPrograms = SavedProgram::with('post.organizer')
        ->where('user_id', $userId)
        ->get()
        ->map(function ($saved) {
            $saved->post->is_saved = true; // Mark as saved for the current user
            return $saved;
        });

    return view('saved_programs', compact('savedPrograms'));
}


public function toggle(Request $request, Post $post)
{
    $userId = auth()->id();
    $isSaved = $request->input('is_saved');

    if ($isSaved) {
        // Add bookmark
        SavedProgram::firstOrCreate([
            'user_id' => $userId,
            'post_id' => $post->id,
        ]);
    } else {
        // Remove bookmark
        SavedProgram::where('user_id', $userId)->where('post_id', $post->id)->delete();
    }

    return response()->json(['success' => true]);
}


}
