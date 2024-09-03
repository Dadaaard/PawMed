<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Events\UserLoggedIn;
use App\Events\UserLoggedOut;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;

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
    public function store(LoginRequest $request)
    {

            // $request->authenticate()
            // $request->session()->regenerate();
            // // Event::dispatch(new UserLoggedIn($request->user()));
            // return redirect()->intended(RouteServiceProvider::HOME);

            $request->authenticate();
        
        Event::dispatch(new UserLoggedIn(Auth::user())); // Pass Auth::user() directly
        $request->session()->regenerate();



        if($request->user()->usertype == "Admin"){
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        else if ($request->user()->usertype == "Doctor") {
            return redirect()->intended(RouteServiceProvider::DOCTOR_HOME);
        }
        return redirect()->intended(RouteServiceProvider::CUSTOMER_HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Event::dispatch(new UserLoggedOut(Auth::user()));

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
