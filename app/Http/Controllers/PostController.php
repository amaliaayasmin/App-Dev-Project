<?php

    namespace App\Http\Controllers;
    use App\Models\Post;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\File;


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


    public function viewApplicants(Post $post)
    {
        // Fetch applicants for the specific post
        $applicants = $post->applicants; // No need to use with('user')

        // Return the view with the applicants data
        return view('Organizer.applicants', compact('post', 'applicants'));
    }

}
