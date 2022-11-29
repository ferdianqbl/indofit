<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoachSignUpRequest;
use App\Http\Requests\CoachUpdateRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Coach;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(): View | RedirectResponse
    {
        if(Auth::guard('coach')->check())
        {
            return redirect()->action([CustomerController::class, 'index']);
        }

        return view('frontend.coach.auth.register', ['title' => 'Register']);
    }

    public function store(CoachSignUpRequest $request): RedirectResponse
    {
        Coach::create($request->validated());

        return redirect()->route('coach.login.view');
    }

    public function login(): View | RedirectResponse
    {
        if(Auth::guard('coach')->check())
        {
            return redirect()->action([CustomerController::class, 'index']);
        }

        return view('frontend.coach.auth.login', ['title' => 'Login']);
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if(Auth::guard('coach')->attempt($credentials, true))
        {
            return redirect()->intended(route('coach.customer'));
        }

        return back()->withErrors(['msg' => ['Invalid credentials']]);
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('coach')->logout();

        return redirect()->route('coach.login.view');
    }

    public function edit(): View
    {
        $title = 'Edit Your Profile';
        $user = Auth::guard('coach')->user();
        return view('frontend.coach.settings.index', compact('title', 'user'));
    }

    public function update(CoachUpdateRequest $request)
    {
        try {
            $credentials = $request->validated();

            $coach = Coach::findOrFail(Auth::guard('coach')->id());

            $coach->name = $credentials['name'];
            $coach->description = $credentials['description'];
            $coach->phone_number = $credentials['phone_number'];

            $coach->save();

            return redirect()->route('coach.settings.edit');
        }catch(\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('msg', 'cant update coach');
        }
    }
}
