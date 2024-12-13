<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SavedProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeedController extends Controller
{
    public function index(Request $request)
    {
        $location = $request->get('location');
        $date = $request->get('date');
        
        // Log the filter values to check what is being passed
        Log::info('Location filter: ' . $location);
        Log::info('Date filter: ' . $date);

        // Start the query to fetch posts
        $query = Post::query(); // We don't need to eager load anything initially

        // Apply filters if they are present
        if ($location) {
            $query->where('location', 'like', '%' . $location . '%'); // Adjust the comparison as needed (case-insensitive or exact match)
        }

        if ($date) {
            $query->whereDate('start_date', $date);
        }

        // Fetch the posts with the applied filters
        $posts = $query->paginate(10); // Adjust pagination as needed

        // Return the view with posts and filter values
        return view('feed.index', compact('posts', 'location', 'date'));
    }

}
