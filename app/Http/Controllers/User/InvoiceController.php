<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Invoice;
use App\Constants\Status;
use App\Models\OrderItem;
use App\Models\OrderItemStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\User\PaymentController;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function handle()
    {
        $title = 'Invoice Detail Anjay';
        $price = Cart::total();
        $additionalPrice = ceil($price * PaymentController::$tax);

        $totalPrice = intval($price + $additionalPrice);
        $order = Order::create(['user_id' => Auth::guard('user')->id(), 'price' => $totalPrice]);

        $orderList = [];
        foreach (Cart::content() as $cart) {
            $orderList[] = [
                'train_date' => $cart->options->train_date,
                'train_since' => $cart->options->train_since,
                'train_until' => $cart->options->train_until,
                'coach_domain_id' => $cart->id,
                'order_id' => $order->id,
                'price' => $cart->total,
            ];
        }

        foreach ($orderList as $key => $value) {
            $orderItem = OrderItem::create($value);
            OrderItemStatus::Create(['order_item_id' => $orderItem->id]);
        }

        $invoice = Invoice::create([
            'order_id' => $order->id,
            'issued_at' => null,
            'status' => Status::PENDING,
        ]);

        Cart::destroy();

        return redirect()->action([InvoiceController::class, 'detail'], ['title' => $title, 'invoice' => $invoice->id]);
    }

    public function detail(Invoice $invoice)
    {
        $title = 'Invoice Detail';
        return view('frontend.user.invoice.index', compact('invoice', 'title'));
    }

    public function setPaid(Invoice $invoice)
    {
        $invoice->status = Status::PAID;
        $invoice->issued_at = Carbon::now();
        $invoice->save();

        return redirect()->back();
    }

    public function generate(Invoice $invoice)
    {
        $invoice->load(['order']);

        $pdf = Pdf::loadView('frontend.user.invoice.proof', compact('invoice'));
        return $pdf->stream();
    }
}
