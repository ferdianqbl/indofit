@extends('frontend.layout.main')

@php
use Akaunting\Money\Money;
use App\Constants\Status;
use Carbon\Carbon;
@endphp

@section('content')
<div class="paymentPage" id="paymentPage">

    <section class="payment" id="payment">
        <div class="container">
            <h1 class="section-title mb-5">INVOICE</h1>
            @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show mb-5 text-center" role="alert">
                <h4>{{ session('message') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row justify-content-center align-items-center">
                <p>Price : {{ Money::IDR($invoice->order->price, true) }}</p>
                <p>Must Be Paid Before : {{ Carbon::parse($invoice->created_at)->format('d M Y, H:i') }}</p>

                @if($invoice->status->value == Status::PENDING->value)
                    <form method="POST" action="{{ route('user.invoice.paid', $invoice->id)}}">
                        @csrf
                        <button class="btn btn-primary">Pay Now</button>
                    </form>
                @elseif($invoice->status->value == Status::PAID->value)
                    <span>Status : THIS IS HAS BEEN PAID</span>
                @else
                    <span>Status : Cancelled</span>
                @endif

                <div>
                    <br>
                    <p>Detail Order</p>
                    @foreach($invoice->order->order_items as $item)
                       <p>Date : {{ $item->train_date }}</p>
                       <p>Train Time : {{ Carbon::parse($item->train_since)->format('H:i') }} - {{ Carbon::parse($item->train_until)->format('H:i') }}</p>
                       <p>Coach : {{ $item->coach_domain->coach->name }}</p>
                       <p>Sport : {{ $item->coach_domain->sport->name }}</p>
                    @endforeach
                </div>
            </div>


        </div>
        <br>
</div>
</section>
</div>
@endsection
