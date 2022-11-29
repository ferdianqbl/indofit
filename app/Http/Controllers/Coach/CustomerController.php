<?php

namespace App\Http\Controllers\Coach;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(): View
    {
        $title = "Your Customer";
        $items = OrderItem::query()
                ->whereHas('order', function($query) {
                    $query->whereHas('invoice', fn($q) => $q->where('status', Status::PAID->value));
                })
                ->whereHas('coach_domain', fn($q) => $q->where('coach_id', Auth::guard('coach')->id()))
                ->get();

        return view('frontend.coach.customer.index', compact('items', 'title'));
    }

    public function detail(Order $order): View
    {
        return view('frontend.coach.customer.detail', compact('order'));
    }
}
