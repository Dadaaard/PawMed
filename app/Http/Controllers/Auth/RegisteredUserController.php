<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Event;
use App\Events\UserLoggedIn;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phonenumber' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $this->validate($request, [
            // Existing validation rules...
            'g-recaptcha-response' => 'required|captcha',
        ],['g-recaptcha-response' => 'Please Verify you are not a robot']);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => Hash::make($request->password),
            'usertype' => "Customer"
        ]);


        event(new Registered($user));
        // Event::dispatch(new UserLoggedIn($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::CUSTOMER_HOME);
    }
}
