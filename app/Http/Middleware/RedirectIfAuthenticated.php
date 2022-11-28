<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  $guard
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
                if(!Auth::guard($guard)->check())
                {
                    return redirect()->route('admin.login.view');
                }

                break;

            case 'coach':
                if(!Auth::guard($guard)->check())
                {
                    return redirect()->route('coach.login.view');
                }

                break;

            default:
                if(!Auth::guard($guard)->check())
                {
                    return redirect()->route('user.login.view');
                }
                break;
        }

        return $next($request);
    }
}
