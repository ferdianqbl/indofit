<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserSignUpRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravolt\Avatar\Facade as Avatar;

class AuthController extends Controller
{
    public function register(): View
    {
        if(Auth::guard('user')->check())
        {
            return view('frontend.welcome');
        }

        return view('frontend.user.auth.register', ['title' => 'Register']);
    }

    public function store(UserSignUpRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());

        if(!$request->file('image'))
        {
            Avatar::create($request['name'])->save(storage_path("app/public/avatar/user_{$user->id}.png"));
        }

        else
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = "user_{$user->id}.{$extension}";

            $file->storeAs('public/avatar', $filename);

            $user->image = $filename;
            $user->save();
        }

        return redirect()->route('user.login.view');
    }

    public function login()
    {
        if(Auth::guard('user')->check())
        {
            return view('frontend.welcome');
        }

        return view('frontend.user.auth.login', ['title' => 'Login']);
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if(Auth::guard('user')->attempt($credentials, true))
        {
            return redirect()->intended(route('home'));
        }

        return back()->withErrors(['msg' => ['Invalid credentials']]);
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('user')->logout();

        return redirect()->route('user.login.view');
    }

    public function edit()
    {
        $title = 'Edit Your Data';
        $user = Auth::guard('user')->user();
        return view('frontend.user.settings.index', compact('title', 'user'));
    }

    public function update(UserUpdateRequest $request)
    {
        $credentials = $request->validated();

        $user = User::findOrFail(Auth::guard('user')->id());

        $user->name = $credentials['name'];
        $user->phone_number = $credentials['phone_number'];

        if($request->file('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = "user_{$user->id}.{$extension}";

            $file->storeAs('public/avatar', $filename);
            $user->image = $filename;
        }

        $user->save();

        return redirect()->route('user.settings.edit');
    }
}
