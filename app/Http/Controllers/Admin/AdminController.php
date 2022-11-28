<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function coach_progress()
    {
        return view('admin.coach_progress');
    }
}
