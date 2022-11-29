<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Akaunting\Money\Money;
use Illuminate\Contracts\View\View;

class PaymentController extends Controller
{
    public static $tax = 1 / 100; // 1%

    public function index(): View
    {
        $title = 'Payment Method';
        $price = Cart::total();

        $additionalPrice = ceil($price * self::$tax);

        return view('frontend.user.payment.index', compact('title', 'price', 'additionalPrice'));
    }
}
