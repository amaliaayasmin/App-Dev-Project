<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizer;

class ShowController extends Controller
{
    public function showController()
    {

        $organizers=Organizer::all();
        return view('admin.dashboard',compact('organizers'));
    }
}
