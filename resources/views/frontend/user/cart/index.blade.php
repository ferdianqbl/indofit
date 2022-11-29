@extends('frontend.layout.main')

@php
use Gloudemans\Shoppingcart\Facades\Cart;
use Akaunting\Money\Money;
@endphp

@section('content')
@if (session('message'))
<span class="text-info">{{ session('message') }}</span>
@endif

<div class="cartPage" id="cartPage">
  <section class="cart-list" id="cart-list">
    <div class="container">
      <h1 class="section-title mb-5">Cart</h1>
      <p class="cart-count text-center">You Have {{ Cart::content()->count() }} item(s)</p>

      @if (Cart::content()->count() > 0)
      <form action={{ route('user.cart.destroy') }} method="POST" class="text-end mb-5">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Remove all</button>
      </form>

      @foreach ($cart as $c)
      <div class="cart-item-card row justify-content-between align-items-center mb-5">
        <div class="cart-item-body col-8 row">
          <div class="col-3">
            <img src="/images/landingPage/home/Pelatih-1.png" alt="cart-img" class="cart-img img-fluid">
          </div>
          <div class="cart-item-body-detail col-9">
            <p class="cart-item-text_name">{{ $c->name }}</p>
            <p class="cart-item-text">Price : {{ Money::IDR($c->price, true) }}</p>
            <p class="cart-item-text">Duration : {{ $c->qty }} {{ $c->qty > 1 ? "hours" : "hour" }}</p>
          </div>
        </div>
        <div class="col-4 text-end">
          <form action={{ route('user.cart.remove', $c->rowId) }} method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary">Delete from cart</button>
          </form>
        </div>
      </div>
      @endforeach
      <div class="cart-total-group">
        <p class="cart-total-text text-end">
          Total Price: {{ Money::IDR(Cart::priceTotal(), true) }}
          <span><a href={{ route('user.payment.view') }} class="ms-3 btn btn-success">Go to Checkout</a></span>
        </p>
      </div>
      @endif
    </div>

  </section>
</div>
@endsection
