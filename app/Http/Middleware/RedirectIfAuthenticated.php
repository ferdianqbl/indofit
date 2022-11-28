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

                if($request->has('admin.login.view') || $request->has('admin.login.authenticate'))
                {
                    return redirect()->back();
                }

                break;

            case 'coach':
                if(!Auth::guard($guard)->check())
                {
                    return redirect()->route('coach.login.view');
                }

                if($request->has('coach.login.view') || $request->has('coach.login.authenticate'))
                {
                    return redirect()->back();
                }

                if($request->has('coach.register.view') || $request->has('coach.register.store'))
                {
                    return redirect()->back();
                }

                break;

            default:
                if(!Auth::guard($guard)->check())
                {
                    return redirect()->route('user.login.view');
                }

                if($request->has('user/login') || $request->has('user.login.authenticate'))
                {
                    return redirect()->route('home');
                }

                if($request->has('user.register.view') || $request->has('user.register.store'))
                {
                    return redirect()->route('home');
                }

                break;
        }

        return $next($request);
    }
}
