<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class CartController extends Controller
{
    public int $hour = 60;

    public function index(): View
    {
        return view('frontend.user.cart.index', ['title' => 'Cart']);
    }
}
