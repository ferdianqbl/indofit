<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoachSignUpRequest;
use App\Http\Requests\UserSignUpRequest;
use App\Models\Coach;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function userIndex(): View
    {
        return view('');
    }

    public function storeUser(UserSignUpRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect()->route('welcome');
    }

    public function coachIndex()
    {
        return view('');
    }

    public function storeCoach(CoachSignUpRequest $request): RedirectResponse
    {
        Coach::create($request->validated());

        return redirect()->route('welcome');
    }
}
