@extends('frontend.layout.main')

@php
use Akaunting\Money\Money;
$formattedPrice = Money::IDR($price, true);
$total = $formattedPrice->add(Money::IDR($additionalPrice, true));
@endphp

@section('content')
  <div class="trainerPage" id="trainerPage">

    @if(session('message'))
        <p class="text-info">{{ session('message') }}</p>
    @endif

    <section class="trainer-list" id="trainer-list">
        <div class="container">
            <div class="row">
                <p>Generate Payment (Ceritanya ada tambahan tax 1% dari harga)</p>
                <form action={{ route('user.invoice.handle') }} method="POST">
                    @csrf
                    <input type="text" hidden value={{ $total }} name="price">
                    <button class="btn btn-warning">Pay {{ $total }} (+ {{ Money::IDR($additionalPrice, true) }})</button>
                </form>
            </div>
            <br>
        </div>
    </section>
</div>
@endsection
