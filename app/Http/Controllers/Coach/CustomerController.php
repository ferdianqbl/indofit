<?php

namespace App\Http\Controllers\Coach;

use App\Constants\PaymentStatus;
use App\Constants\Progress;
use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\CancelReason;
use App\Models\OrderItem;
use App\Models\OrderItemStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(): View
    {
        $title = "Your Customer";
        $items = OrderItem::query()
                ->whereHas('order', function($query) {
                    $query->whereHas('invoice', fn($q) => $q->where('transaction_status', PaymentStatus::SETTLEMENT->value));
                })
                ->whereHas('coach_domain', fn($q) => $q->where('coach_id', Auth::guard('coach')->id()))
                ->whereHas('order_item_status', fn($q) => $q->where('status', Progress::RUNNING->value))
                ->get();

        return view('frontend.coach.customer.index', compact('items', 'title'));
    }

    public function detail(Order $order): View
    {
        return view('frontend.coach.customer.detail', compact('order'));
    }

    public function markAsDone(OrderItemStatus $order_item_status)
    {
        $order_item_status->update(['status' => Progress::FINISHED->value]);

        return redirect()->route('coach.customer');
    }

    public function cancelView(OrderItemStatus $order_item_status)
    {
        $title = "Alasan Batal";
        return view('frontend.coach.customer.cancel', compact('title', 'order_item_status'));
    }

    public function cancel(Request $request, OrderItemStatus $order_item_status)
    {
        $reason = $request->request->get('reason');
        if($reason == '' || strlen($reason) > 250)
        {
            return redirect()->back();
        }

        $order_item_status->update(['status' => Progress::CANCELED->value, 'cancellation_status' => 1]);

        CancelReason::create([
            'order_item_status_id' => $order_item_status->id,
            'reason' => $reason,
        ]);

        return redirect()->route('coach.customer');
    }
}
