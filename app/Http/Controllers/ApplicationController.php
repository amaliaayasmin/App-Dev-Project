<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $appliedPrograms = $user->appliedPrograms; // Get applied programs for the student
        return view('applications.index', compact('appliedPrograms'));
    }
}
