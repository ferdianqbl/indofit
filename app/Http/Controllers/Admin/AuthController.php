<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(): View
    {
        session(['url.intended' => url()->previous()]);
        return view('admin.login');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (session()->has('url.intended'))
        {
            $redirectTo = session()->get('url.intended');
            session()->forget('url.intended');
        }

        if(Auth::guard('admin')->attempt($credentials, true))
        {
            if($redirectTo)
            {
                return redirect($redirectTo);
            }

            return redirect()->action([AdminController::class, 'overview']);
        }

        return back()->withErrors(['msg' => ['Invalid credentials']]);
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
