<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ShowController extends Controller
{
    public function showController()
    {

        $organizers=Organizer::all();
        return view('admin.dashboard',compact('organizers', 'user'));
    }

    public function deleteOrganizer(Request $request){
        $id=$request->id;
        Organizer::where('id',$id)->delete();
        return Redirect::route('admin.dashboard');
    }
    public function deleteUser(Request $request){
        $id=$request->id;
        User::where('id',$id)->delete();
        $organizers=Organizer::all();
        $user=User::all();
        return Redirect::route('admin.dashboard');
    }
    public function viewUser()
    {
        return view('admin.user');
    }
    public function addUser(Request $request){
        // Create the user with the validated data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Return a response (e.g., redirect to a success page or back to a list of users)
        return Redirect::route('view.user')->with('success', 'User created successfully');

    }
    public function viewOrganizer()
    {
        return view('admin.organizer');
    }
    public function addOrganizer(Request $request){
        // Create the user with the validated data
        $user = Organizer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Return a response (e.g., redirect to a success page or back to a list of users)
        return Redirect::route('view.organizer')->with('success', 'User created successfully');

    }
}
