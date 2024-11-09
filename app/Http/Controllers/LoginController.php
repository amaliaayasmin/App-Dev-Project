<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    // If you'd prefer using a method:
    // protected function redirectTo()
    // {
    //     return '/home';
    // }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
