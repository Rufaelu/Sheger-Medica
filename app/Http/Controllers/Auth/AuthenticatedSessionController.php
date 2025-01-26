<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Traits\HasRoles;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::user()->hasRole('admin')){
        return redirect()->route('Home');
        }
        elseif(Auth::user()->hasRole('practitioner')){
            // dd('Practitioner');
            return redirect()->route('Home');
        }
        else{
            // dd('User');
            return redirect()->route('Home');        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (Auth::guard('admin')->check()) {
        // Logout admin user
        Auth::guard('admin')->logout();
    } elseif (Auth::guard('practitioner')->check()) {
        // Logout practitioner user
        Auth::guard('practitioner')->logout();
    } else {
        // Logout regular user (default to 'web' guard)
        Auth::guard('web')->logout();
    }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
