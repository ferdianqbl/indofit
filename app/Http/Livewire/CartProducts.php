<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Akaunting\Money\Money;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CartProducts extends Component
{
    use LivewireAlert;

    public function render()
    {
        $totalItem =  Cart::content()->count();
        $totalPrice = Money::IDR(Cart::priceTotal(), true);
        $cart =  Cart::content();
        return view('livewire.cart-products', compact('totalItem', 'cart', 'totalPrice'));
    }

    public function removeFromCart(string $cartId)
    {
        try {
            Cart::remove($cartId);
            $this->alert('info', 'Pesanan dihapus');
        } catch(InvalidRowIDException) {
            $this->alert('success', 'Pesanan tidak diketahui');
        } catch(\Exception) {
            $this->alert('error', 'Pesanan tidak diketahui');
        }
    }

    public function removeAll()
    {
        Cart::destroy();
        $this->alert('info', 'Semua pesanan telah terhapus');
    }
}
