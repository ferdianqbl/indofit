<?php

namespace App\Http\Controllers;

class LandingPage extends Controller
{
    public function home()
    {
        return view('frontend.user.home.index', [
            'title' => 'Home',
        ]);
    }

    public function about()
    {
        return view('frontend.user.about.index', [
            'title' => 'About',
        ]);
    }
}
