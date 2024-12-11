<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeedController extends Controller
{
    public function index(Request $request)
    {
        // Get filter values from the request
        $organizerId = $request->get('organizer_id');
        $date = $request->get('date');
        $activityType = $request->get('activity_type');
        
        // Log the filter values to check what is being passed
        Log::info('Organizer ID filter: ' . $organizerId);
        Log::info('Date filter: ' . $date);
       // Log::info('Activity Type filter: ' . $activityType);

        // Start the query to fetch posts
        $query = Post::with('organizer'); // 'organizer' should be the relationship method defined in the Post model.

        // Apply filters if they are present
        if ($organizerId) {
            $query->where('organizer_id', $organizerId);
        }
        if ($date) {
            $query->whereDate('start_date', $date);
        }
        /* if ($activityType) {
            $query->where('activity_type', 'like', '%' . $activityType . '%');
        } */

        // Fetch the posts with the applied filters
        $posts = $query->paginate(10); // Adjust pagination as needed

        // Return the view with posts and filter values
        return view('feed.index', compact('posts', 'organizerId', 'date'));
    }
}
