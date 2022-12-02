<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Models\CoachDomain;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Exceptions\InvalidRowIDException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public int $hour = 60;

    public function index(): View
    {
        return view('frontend.user.cart.index', ['title' => 'Cart']);
    }
}
