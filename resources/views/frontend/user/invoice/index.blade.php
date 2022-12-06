@extends('frontend.layout.main')

@php
  use Akaunting\Money\Money;
  use App\Constants\PaymentStatus;
  use Carbon\Carbon;
@endphp

@section('content')
  <div class="paymentPage" id="paymentPage">

    <section class="payment" id="payment">
      <div class="container">
        <h1 class="section-title mb-5">DATA</h1>
        @if (session('message'))
          <div class="alert alert-success alert-dismissible fade show mb-5 text-center" role="alert">
            <h4>{{ session('message') }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="row justify-content-center align-items-center">
          <div class="col-md-5">
            <img src="/images/landingPage/home/transaction-success.png" alt="invoice-img" class="img-fluid">
          </div>
          <div class="col-md-7">
            <p><strong>Harga Total : {{ Money::IDR($invoice->order->price, true) }}</strong></p>

            {{-- <a href={{ route('user.invoice.proof', $invoice->id) }}>See Invoice</a> --}}

            <div>
              <p><strong>Detail Pesanan</strong></p>
              @foreach ($invoice->order->order_items as $item)
                <p class="section-text">Tanggal : {{ $item->train_date }}</p>
                <p class="section-text">Waktu Latihan : {{ Carbon::parse($item->train_since)->format('H:i') }} -
                  {{ Carbon::parse($item->train_until)->format('H:i') }}</p>
                <p class="section-text">Pelatih : {{ $item->coach_domain->coach->name }}</p>
                <p class="section-text">Olahraga : {{ $item->coach_domain->sport->name }}</p>
                <br>
              @endforeach
            </div>

            @if ($invoice->transaction_status == PaymentStatus::PENDING->value)
              <a href="{{ route('user.payment.repay', $invoice->id) }}" class="btn btn-primary">Bayar Sekarang</a>
            @elseif($invoice->transaction_status == PaymentStatus::SETTLEMENT->value)
              <span>Status : {{ $invoice->transaction_status }} (Terbayar)</span>
            @else
              <span>Status : Dibatalkan</span>
            @endif
          </div>
        </div>

      </div>
      <br>
  </div>
  </section>
  </div>
@endsection
