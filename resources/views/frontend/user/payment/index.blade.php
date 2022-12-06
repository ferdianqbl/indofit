@extends('frontend.layout.main')

@php
use Akaunting\Money\Money;
$formattedPrice = Money::IDR($price, true);
$total = $formattedPrice->add(Money::IDR($additionalPrice, true));
@endphp

@section('content')
<div class="paymentPage" id="paymentPage">

    <section class="payment" id="payment">
        <div class="container">
            <h1 class="section-title mb-5">PEMBAYARAN</h1>
            @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show mb-5 text-center" role="alert">
                <h4>{{ session('message') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row justify-content-center align-items-center">
                <div class="col-4 me-5">
                    <img src="/images/landingPage/home/transaction-success.png" alt="" class="img-fluid my-5">
                </div>
                <div class="col-6">
                    <div class="payment-detail">
                        <p class="payment-detail-title">Detail Informasi Pembayaran</p>
                        <p class="payment-detail-text">Biaya Tambahan : 1% ({{Money::IDR($additionalPrice,
                            true)}})</p>
                        <p class="payment-detail-text">Subtotal : {{ $formattedPrice }}</p>
                        <p class="payment-detail-text">Total : {{ $total }}</p>
                    </div>
                </div>
            </div>
            <form action={{ route('user.payment.handle') }} method="POST" class="text-center">
                @csrf
                <button class="btn btn-success d-block mx-auto mb-3">Lanjut Bayar</button>
                <p>Jika lanjut, anda akan diarahkan ke panel pembayaran (tidak dapat dibatalkan)</p>
                <a href="{{ route('user.cart.view') }}" class="btn btn-outline-secondary">Kembali</a>
            </form>


        </div>
        <br>
</div>
</section>
</div>
@endsection
