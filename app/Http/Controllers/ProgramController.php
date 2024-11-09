<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        // Fetch all programs from the database
        $programs = Program::all();

        // Pass the programs to the feed view
        return view('feed', compact('programs'));
}
}