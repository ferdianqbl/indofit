<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;
use App\Models\OrderItem;
use App\Constants\Status;

class InvoiceController extends Controller
{
    public function handle()
    {
        $title = 'Payment Method';
        $price = Cart::total();
        $additionalPrice = ceil($price * PaymentController::$tax);

        $totalPrice = ($price + $additionalPrice) / 100;

        $order = Order::create(['user_id' => Auth::guard('user')->id(), 'price' => $totalPrice]);

        $orderList = [];
        foreach (Cart::content() as $cart) {
            $orderList[] = [
                'train_date' => $cart->options->train_date,
                'train_since' => $cart->options->train_since,
                'train_until' => $cart->options->train_until,
                'coach_domain_id' => $cart->id,
                'order_id' => $order->id,
            ];
        }

        foreach ($orderList as $key => $value) {
            OrderItem::create($value);
        }

        Invoice::create([
            'order_id' => $order->id,
            'issued_at' => null,
            'status' => Status::PENDING,
        ]);

        Cart::destroy();

        return redirect()->view('frontend.user.history.index', compact('title'))->with('message', 'Check history');
    }

    public function detail()
    {

    }
}
