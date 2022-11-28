<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register()
    {
        return view('frontend.coach.auth.register', ['title' => 'Register']);
    }

    public function store()
    {

    }

    public function login()
    {
        return view('frontend.coach.auth.login', ['title' => 'Login']);
    }

    public function authenticate()
    {

    }

    public function logout()
    {

    }
}
