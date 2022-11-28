<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('frontend.login.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::guard('web')->attempt($credentials)) {
            $details = Auth::guard('web')->user();
            $user = $details->first();

            if($user->role == Role::Admin)
            {
                return redirect()->route('admin.overview');
            }

            return redirect()->route('');
        }

        if (Auth::guard('coach')->attempt($credentials)) {
            $details = Auth::guard('coach')->user();
            $coach = $details->first();

            return redirect()->route('');
        }

        return redirect()->back()->withErrors(['msg' => 'Invalid credentials']);
    }
}
