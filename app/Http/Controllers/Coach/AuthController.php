<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoachSignUpRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Coach;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(): View
    {
        return view('frontend.coach.auth.register', ['title' => 'Register']);
    }

    public function store(CoachSignUpRequest $request): RedirectResponse
    {
        Coach::create($request->validated());

        return redirect()->route('coach.login.view');
    }

    public function login(): View
    {
        session(['url.intended' => url()->previous()]);
        return view('frontend.coach.auth.login', ['title' => 'Login']);
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (session()->has('url.intended'))
        {
            $redirectTo = session()->get('url.intended');
            session()->forget('url.intended');
        }

        if(Auth::guard('coach')->attempt($credentials, true))
        {
            if($redirectTo)
            {
                return redirect($redirectTo);
            }

            return redirect()->route('coach.customer');
        }

        return back()->withErrors(['msg' => ['Invalid credentials']]);
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('coach')->logout();

        return redirect()->route('coach.login.view');
    }
}
