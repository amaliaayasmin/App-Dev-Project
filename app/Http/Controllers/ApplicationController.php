<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ApplicationController extends Controller
{
    public function index()
    {
        // Fetch the applied programs for the authenticated user
        $appliedPrograms = Auth::user()->appliedPrograms; // Adjust this based on your relationships

        return view('applications.index', compact('appliedPrograms')); // Pass the data to the view
    }

    public function appliedPrograms()
{
    return $this->belongsToMany(Post::class, 'applied_programs', 'user_id', 'post_id')
                ->withPivot('status', 'created_at');
}
}