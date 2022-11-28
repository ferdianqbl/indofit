<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(): View
    {
        return view('frontend.user.review.index');
    }
}
