@php use Akaunting\Money\Money; @endphp

<div>
  <p class="cart-count text-center">You Have {{ $totalItem }} item(s)</p>

  @if (Cart::content()->count() > 0)
    <div class="text-end mb-5">
      <button wire:click="removeAll" class="btn btn-danger">Remove All</button>
    </div>
  @endif

  @forelse($cart as $c)
    <div class="cart-item-card row justify-content-between align-items-center mb-5">
      <div class="cart-item-body col-8 row">
        <div class="col-3">
          <img src="/images/landingPage/home/Pelatih-1.png" alt="cart-img" class="cart-img img-fluid">
        </div>
        <div class="cart-item-body-detail col-9">
          <p class="cart-item-text_name">{{ $c->name }}</p>
          <p class="cart-item-text">Price : {{ Money::IDR($c->price, true) }}</p>
          <p class="cart-item-text">Duration : {{ $c->qty }} {{ $c->qty > 1 ? 'hours' : 'hour' }}</p>
        </div>
      </div>

      <div class="col-4 text-end">
        <button wire:click="removeFromCart('{{ $c->rowId }}')" class="btn btn-info">Hapus</button>
      </div>
    </div>
  @empty
    Tidak ada isi dalam keranjang
  @endforelse

  @if (Cart::content()->count() > 0)
    <div class="cart-total-group">
      <p class="cart-total-text text-end">
        Total Price: {{ $totalPrice }}
        <span><a href={{ route('user.payment.view') }} class="ms-3 btn btn-success">Go to Checkout</a></span>
      </p>
    </div>
  @endif
</div>
