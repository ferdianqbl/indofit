<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserSignUpRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(): View
    {
        return view('frontend.user.auth.register', ['title' => 'Register']);
    }

    public function store(UserSignUpRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect()->route('user.login.view');
    }

    public function login()
    {
        return view('frontend.user.auth.login', ['title' => 'Login']);
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        if(Auth::attempt($credentials, true))
        {
            return redirect()->intended(route('home'));
        }

        return back()->withErrors(['msg' => ['Invalid credentials']]);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('user.login.view');
    }
}