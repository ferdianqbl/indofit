<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    //TODO
    public function overview()
    {
        return view('admin.overview');
    }

    public function orders()
    {
        return view('admin.orders');
    }

    public function coach()
    {
        return view('admin.coach');
    }

    public function coachProgress()
    {
        return view('admin.coach_progress');
    }
}
