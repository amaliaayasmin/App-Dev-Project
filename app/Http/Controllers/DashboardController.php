<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        // Ensure this matches the route
        $student = auth('web')->user();
    
        // Check if student is logged in
        if (!$student) {
            return redirect()->route('login')->with('error', 'You must be logged in to view the dashboard.');
        }
        
        // Get the total number of saved programs for the logged-in student
        $savedCount = DB::table('saved_programs')
            ->where('user_id', $student->id)
            ->count();
    
        // Get the total number of applied programs for the logged-in student
        $joinedCount = DB::table('applied_programs')
            ->where('user_id', $student->id)
            ->count();

        // Get the total number of accepted programs for the logged-in student
        $acceptedCount = DB::table('applied_programs')
        ->where('user_id', $student->id)
        ->where('status', 'accepted')  // Filter by accepted status
        ->count();  // Count the accepted programs

        $acceptedPrograms = DB::table('applied_programs')
        ->where('user_id', $student->id)
        ->where('status', 'accepted')
        ->join('posts', 'applied_programs.post_id', '=', 'posts.id')
        ->select('posts.start_date', 'posts.end_date', 'posts.title')
        ->get()
        ->map(function($program) {
            $program->start_date = \Carbon\Carbon::parse($program->start_date)->toDateString();
            $program->end_date = \Carbon\Carbon::parse($program->end_date)->toDateString();
            return $program;
        });
        
        // Return the data to the view
        return view('dashboard', compact('savedCount', 'joinedCount', 'acceptedCount', 'acceptedPrograms'));
    }

}


