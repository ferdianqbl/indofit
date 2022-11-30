<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Contracts\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $reviews = Review::with(['user', 'coach'])->get();
        return view('frontend.user.review.index', compact('reviews'));
    }
}
