<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        // Fetch all posts (you can paginate if necessary)
        $posts = Post::all(); // Fetch all posts from the database
        return view('feed.index', compact('posts')); // Return view 'feed.index' and pass posts
    }

}
