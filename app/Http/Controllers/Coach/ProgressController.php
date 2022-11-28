<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ProgressController extends Controller
{
    public function index(): View
    {
        return view('frontend.coach.progress.index');
    }
}
