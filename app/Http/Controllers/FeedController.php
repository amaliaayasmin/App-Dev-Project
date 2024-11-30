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
        $organization = $request->get('organization');
        $date = $request->get('date');
        $activityType = $request->get('activity_type');
        
        // Log the filter values to check what is being passed
        Log::info('Organization filter: ' . $organization);
        Log::info('Date filter: ' . $date);
       // Log::info('Activity Type filter: ' . $activityType);

        // Start the query to fetch posts
        $query = Post::with('organizer'); 

        // Apply filters if they are present
        if ($organization) {
            $query->where('organization', 'like', '%' . $organization . '%');
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
        return view('feed.index', compact('posts', 'organization', 'date', /*'activityType'*/));
    }
}
