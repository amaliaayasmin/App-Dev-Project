<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Notifications\MessageSent; // Import the  notification

class PostController extends Controller
{
    public function index()
    {
        // Get the authenticated organizer
        $organizer = auth()->guard('organizer')->user();

        // Retrieve only the posts that belong to the authenticated organizer
        $posts = Post::where('organizer_id', $organizer->id)->get();

        return view('post.index', compact('posts'));    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'start_time' => 'nullable|date_format:H:i',
        'end_time' => 'nullable|date_format:H:i',
        'benefits' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Create a new post
    $post = new Post();
    $post->title = $request->title;
    $post->location = $request->location;
    $post->start_date = $request->start_date;
    $post->end_date = $request->end_date;
    $post->start_time = $request->start_time;
    $post->end_time = $request->end_time;
    $post->benefits = $request->benefits;
    $post->description = $request->description;

    // Handle file upload if an image is provided
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $post->image = $imageName;
    }

    // Set the organizer_id
    $post->organizer_id = auth()->guard('organizer')->user()->id; // Ensure this is set correctly

    // Save the post
    $post->save();

    return redirect()->route('post.index')->with('success', 'Post created successfully.');
}
   

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit (Post $post)
    {
        
        return view('post.edit', compact ('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'benefits' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Prepare data for updating
        $data = [
            'title' => $request->title,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'benefits' => $request->benefits,
            'description' => $request->description,
        ];
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image && File::exists(public_path('images/' . $post->image))) {
                File::delete(public_path('images/' . $post->image));
            }
    
            // Upload the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName; // Set the new image name in data
        }
    
        // Update the post with the new data
        $post->update($data);
    
        return redirect()->route('post.index')->with('success', 'Post updated successfully.');
    }

    
    public function destroy (Post $post) 
    { 
        // Check if the post has an image
        if ($post->image && File::exists(public_path('images/' . $post->image))) 
        {
            // Delete the image file from the server
            File::delete(public_path('images/' . $post->image));
        }
        $post->delete();
        return redirect('/post') ;
    }

    public function search(Request $request)
{
    // Get the search query from the request
    $query = $request->input('query');

    // Search posts by title, description, or any other fields you want
    $posts = Post::where('title', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->get();

    // Return the results to the view
    return view('feed.index', compact('posts'));
}


public function accept(Request $request, $postId, $applicantId)
{
    // Update the status to 'accepted' in the applied_programs table
    $updated = DB::table('applied_programs')
        ->where('user_id', $applicantId)
        ->where('post_id', $postId)
        ->update(['status' => 'accepted']);

       
        return redirect()->back()->with('success', 'Applicant accepted successfully and notified.');

}

public function sendMessage(Request $request, $postId, $applicantId)
{
    // Validate the incoming request
    $request->validate([
        'message' => 'required|string|max:255',
    ]);

    // Create a new message
    Message::create([
        'user_id' => $applicantId, // Assuming this is the applicant's user ID
        'post_id' => $postId,
        'message' => $request->message,
    ]);

    // Send a notification to the applicant
    $student = User::find($applicantId);
    $organizer = auth()->user(); // Get the currently authenticated user
    $student->notify(new MessageSent($request->message, $organizer->name)); // Pass the organizer's name

    return redirect()->back()->with('success', 'Message sent successfully and applicant notified.');
}

    public function reject($postId, $userId)
    {
        // Update the status to 'rejected' in the applied_programs table
        DB::table('applied_programs')
            ->where('user_id', $userId)
            ->where('post_id', $postId)
            ->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Applicant rejected successfully.');
    }  
    
    public function viewApplicants(Post $post)
    {
        $applicants = $post->applicantsWithStatus; // Fetch applicants with status
        return view('Organizer.applicants', compact('post', 'applicants'));
    }

    public function unsave(Request $request)
{
    $postId = $request->post_id;
    $user = auth()->user(); // Assuming user is authenticated
    
    $savedPost = $user->savedPrograms()->where('post_id', $postId)->first();
    if ($savedPost) {
        $user->savedPrograms()->detach($postId); // Detach the post from saved programs
        return response()->json(['message' => 'Program unsaved successfully']);
    }

    return response()->json(['message' => 'Program not found in saved list'], 404);
}



}
