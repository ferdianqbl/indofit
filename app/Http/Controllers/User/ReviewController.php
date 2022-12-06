<?php

namespace App\Http\Controllers\User;

use App\Constants\Progress;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(): View
    {
        $reviews = Review::with(['user', 'coach'])->get();
        return view('frontend.user.review.index', compact('reviews'));
    }

    public function show(): View
    {
        $title = 'Review Anda';

        $items = OrderItem::doesntHave('review')
        ->withWhereHas('order_item_status', fn($q) => $q->where('status', Progress::FINISHED->value))
        ->get();

        return view('frontend.user.review.personal', compact('title', 'items'));
    }

    public function create(OrderItem $order_item)
    {
        $title = "Tulis Review";
        $qty = Review::where('order_item_id', $order_item->id)->count('order_item_id');
        if($qty > 0)
        {
            return redirect()->back();
        }

        $order_item->load('coach_domain');

        return view('frontend.user.review.create', compact('title', 'order_item'));
    }
}
