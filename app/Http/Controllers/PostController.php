<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    public function index()
    {
        $posts= Post :: paginate(10);
        return view('post.index',[
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store (Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'benefits' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' =>'nullable|image|mimes:png,jpg,jpeg|max:2048' 
        
        ]);
        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
        }

        Post::create([
            'title' => $request->title,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'benefits' => $request->benefits,
            'description' => $request->description,
            'image' => $filename, // Save the filename to the database
        ]);

        // Redirect the user to the show page for the newly created post
        return redirect('/post');
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
            'image' =>'nullable|image|mimes:png,jpg,jpeg|max:2048' 
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            if (File::exists(public_path('images/' . $post->image))){
                    File::delete($post->image);
            }
        }
        $post->update(([
            'title' => $request->title,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'benefits' => $request->benefits,
            'description' => $request->description,
            'image' => $filename, 
        ]));

        return redirect('/post');
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


}
