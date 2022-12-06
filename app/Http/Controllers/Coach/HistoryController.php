<?php

namespace App\Http\Controllers\Coach;

use App\Models\OrderItem;
use App\Constants\Progress;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(): View
    {
        $title = "Coach's History";
        $items = OrderItem::query()
                ->whereHas('order_item_status', fn($q) => $q->where('status', Progress::FINISHED->value)->orWhere('status', Progress::CANCELED->value))
                ->whereHas('coach_domain', fn($q) => $q->where('coach_id', Auth::guard('coach')->id()))
                ->orderBy('updated_at', 'DESC')
                ->get();

        return view('frontend.coach.history.index', compact('items', 'title'));
    }
}
