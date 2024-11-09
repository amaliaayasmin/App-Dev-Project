<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        return view('post.index');
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
        ]);

        Post::create($request->only([
            'title',
            'location',
            'start_date',
            'end_date',
            'start_time',
            'end_time',
            'benefits',
            'description'
        ]));

        // Redirect the user to the show page for the newly created post
        return redirect()->back()->with('success', 'Post created successfully.');    }

    public function show(Post $post)
{
    return view('post.show', compact('post'));
}

    public function edit (Post $post)
    {
        
        return view('post.edit');
    }

}
