<?php

namespace App\Http\Controllers;

use App\Models\User; // Assuming the student is stored in the 'users' table
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Show the profile of the student.
     */
    public function show($id)
    {
        // Retrieve the student using the ID
        $student = User::findOrFail($id); // Change 'User' if you have a separate Student model
        // Return a view with the student's data
        return view('students.show', compact('student'));
    }
}
