@extends('frontend.layout.main')

@section('content')
  <section class="customerTrainerPage" id="customerTrainerPage">
    <div class="container">
      <h1 class="section-title text-center">CUSTOMER ORDER</h1>
      <p class="section-text text-center mb-5">Here is your customer for now</p>

      <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($items as $item)
          <div class="col">
            <div class="card customer-order-card h-100">
              <img src="/images/landingPage/home/user-{{ rand(1, 3) }}.png" alt="customer-order-img"
                class="card-img-top img-fluid p-3 customer-order-img">
              <div class="card-body customer-order-card-body">
                <h5 class="card-title">{{ $item->order->user->name }}</h5>
                <p class="card-text text-secondary">Date : {{ date('d/m/Y', strtotime($item->train_date)) }}</p>
                <p class="card-text text-secondary">Time : {{ $item->train_until }} - {{ $item->train_since }}</p>
                <p class="card-text text-secondary">Price : Rp{{ number_format($item->order->price) }}</p>
                <a href="#" class="btn btn-primary">Detail</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
