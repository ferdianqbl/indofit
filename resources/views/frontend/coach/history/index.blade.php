@extends('frontend.layout.main')

@php
    use Akaunting\Money\Money;
    use Carbon\Carbon;
@endphp

@section('content')
  <section class="customerTrainerPage" id="customerTrainerPage">
    <div class="container">
      <h1 class="section-title text-center">Your History</h1>
      <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @if($items->isEmpty())
            No History
        @else
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Sport</th>
                  <th scope="col">Working Time</th>
                  <th scope="col">Customer</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $item->coach_domain->sport->name }}</td>
                        <td>{{ Carbon::parse($item->train_date)->format('d M Y') }} | {{ Carbon::parse($item->train_since)->format('H:i') }} - {{ Carbon::parse($item->train_until)->format('H:i') }}</td>
                        <td>{{ $item->order->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif

      </div>
    </div>
  </section>
@endsection
