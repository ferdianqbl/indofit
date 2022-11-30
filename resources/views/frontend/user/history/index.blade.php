@extends('frontend.layout.main')

@php
  use Carbon\Carbon;
  use Akaunting\Money\Money;
@endphp

@section('content')
  <section class="historyPage" id="historyPage">
    <div class="container">
      <h1 class="section-title mb-5">HISTORY</h1>
      <div class="col row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @if ($histories->count() > 0)
          @foreach ($histories as $history)
            <div class="col">
              <div class="review-card">
                <p class="review-text">
                <p>Order Date : {{ Carbon::parse($history->created_at)->format('d M Y') }}</p>
                </p>
                <p class="review-text">Price : <strong>{{ Money::IDR($history->order->price, true) }}</strong></p>
                <p class="review-text">Status : <strong>{{ $history->status->name }}</strong>
                <p class="review-text">Paid At : {{ $history->issued_at ?? 'Unpaid' }}</p>
                <a href={{ route('user.invoice.detail', $history->id) }} class="btn btn-primary">See Detail</a>
              </div>
            </div>
          @endforeach
        @else
          No History
        @endif
      </div>
    </div>
  </section>
@endsection
