@extends('frontend.layout.main')

@php
    use Akaunting\Money\Money;
    use Carbon\Carbon;
@endphp

@section('content')
  <section class="customerTrainerPage" id="customerTrainerPage">
    <div class="container">
      <h1 class="section-title text-center">CUSTOMER ORDER</h1>

      <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @if($items->empty())
            No Customer For Now
        @else
            @foreach ($items as $item)
            <div class="col">
            <div class="card customer-order-card h-100">
                <img src="/images/landingPage/home/user-{{ rand(1, 3) }}.png" alt="customer-order-img"
                class="card-img-top img-fluid p-3 customer-order-img">
                <div class="card-body customer-order-card-body">
                <h5 class="card-title">{{ $item->order->user->name }}</h5>
                <p class="card-text text-secondary">Category : <span class="badge badge-secondary">{{ $item->coach_domain->sport->name }}</span></p>
                <p class="card-text text-secondary">Date : {{ Carbon::parse($item->train_date)->format('d M Y') }}</p>
                <p class="card-text text-secondary">
                    Time : {{ Carbon::parse($item->train_until)->format('H:i') }} - {{ Carbon::parse($item->train_since)->format('H:i') }}
                </p>
                <a href="#" class="btn btn-primary">Contact</a>
                </div>
            </div>
            </div>
            @endforeach
        @endisset

      </div>
    </div>
  </section>
@endsection
