<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    public function store(Post $post)
    {
        $user = Auth::user();

        if ($post->applicants()->where('user_id', $user->id)->exists()) {
            return response()->json(['message' => 'You have already applied'], 400);
        }

        // Save the application with default status
        $post->applicants()->attach($user->id, ['status' => 'pending']);

        return response()->json(['message' => 'Application submitted successfully']);
    }
}
