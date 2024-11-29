<?php

namespace App\Http\Controllers\Organizer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\OrganizerLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('Organizer.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(OrganizerLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('organizer.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('organizer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
