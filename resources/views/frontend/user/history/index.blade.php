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
            <p>Order Date : {{ Carbon::parse($history->created_at)->format('d M Y') }}</p>
            <p>Price : {{ Money::IDR($history->order->price, true) }}</p>
            <p>Status : {{ $history->status->name }}</p>
            <p>Paid At : {{ $history->issued_at ?? 'Unpaid' }}</p>
            <a href={{ route('user.invoice.detail', $history->id) }}>See Detail</a>
            <br>
            <br>
          @endforeach
        @else
          No History
        @endif
      </div>
    </div>
  </section>
@endsection
