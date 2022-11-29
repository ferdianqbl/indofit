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
        $cart = Cart::content();
        $title = 'Cart Detail';
        return view('frontend.user.cart.index', compact('cart', 'title'));
    }

    public function store(StoreCartRequest $request): RedirectResponse
    {
        $order = $request->validated();
        $coachDomain = CoachDomain::findOrFail($order['coach_domain_id']);

        $since = Carbon::parse($order['train_since']);
        $until = Carbon::parse($order['train_until']);

        // perbedaan dalam menit / 60 ==> dapet hasil dalam jam
        $hours = number_format($until->diffInMinutes($since) / $this->hour, 2);

        $price = $coachDomain->price;

        Cart::add([
            'id' => $order['coach_domain_id'],
            'name' => $coachDomain->coach->name,
            'qty' => $hours,
            'price' => $price,
            'weight' => 0,
            'options' => [
                'train_date' => $order['train_date'],
                'train_since' => $order['train_since'],
                'train_until' => $order['train_until'],
            ],
        ]);

        return redirect()->route('user.trainer.view')->with('message', 'Added to cart');
    }


    public function remove(string $rowId): RedirectResponse
    {
        try {
            Cart::remove($rowId);
            return redirect()->route('user.cart.view')->with('message', 'Removed from cart');
        } catch(InvalidRowIDException) {
            return redirect()->route('user.cart.view')->with('message', 'Unknown cart item');
        }
    }

    public function destroy(): RedirectResponse
    {
        Cart::destroy();

        return redirect()->route('user.cart.view')->with('message', 'All items has been removed from cart');
    }
}
