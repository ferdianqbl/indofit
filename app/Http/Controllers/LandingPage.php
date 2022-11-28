<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPage extends Controller
{
    public function home()
    {
        return view('frontend.user.home.index', [
            'title' => 'Home',
        ]);
    }
}
