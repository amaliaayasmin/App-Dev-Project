<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    // Handle search functionality
    public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query
        $results = User::where('name', 'like', '%' . $query . '%')
                       ->orWhere('email', 'like', '%' . $query . '%')
                       ->get();

        return view('dashboard', compact('results'));
    }
}
