<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register()
    {
        return view('frontend.user.auth.register', ['title' => 'Register']);
    }

    public function store()
    {

    }

    public function login()
    {
        return view('frontend.user.auth.login', ['title' => 'Login']);
    }

    public function authenticate()
    {

    }

    public function logout()
    {

    }
}
