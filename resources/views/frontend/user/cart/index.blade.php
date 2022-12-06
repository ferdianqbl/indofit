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
      <h1 class="section-title mb-5">Keranjang</h1>
      @livewire('cart-products')
    </div>
  </section>
</div>
@endsection
