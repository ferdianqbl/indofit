<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        return view('frontend.coach.customer.index');
    }

    public function detail(Order $order): View
    {
        return view('frontend.coach.customer.detail', compact('order'));
    }
}