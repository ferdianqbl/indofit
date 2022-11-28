<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(): RedirectResponse
    {
        if(Auth::guard('web')->check())
        {
            Auth::guard('web')->logout();
        }

        else if(Auth::guard('coach')->check())
        {
            Auth::guard('coach')->logout();
        }

        return redirect()->route('home');
    }
}
