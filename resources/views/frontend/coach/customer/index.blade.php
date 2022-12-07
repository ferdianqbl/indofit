@extends('frontend.layout.main')

@php
  use Akaunting\Money\Money;
  use Carbon\Carbon;
@endphp


@section('content')
  <section class="customerTrainerPage" id="customerTrainerPage">
    <div class="container">
      <h1 class="section-title text-center">PELANGGAN ANDA</h1>

      <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @if ($items->isEmpty())
          Belum ada untuk saat ini.
        @else
          @foreach ($items as $item)
            <div class="col">
              <div class="card customer-order-card h-100">
                <img src="/storage/avatar/{{ $item->order->user->image }}" alt="customer-order-img"
                  class="card-img-top img-fluid p-3 customer-order-img">
                <div class="card-body customer-order-card-body">
                  <h5 class="card-title">{{ $item->order->user->name }}</h5>
                  <p class="card-text text-secondary">Kategori : <span
                      class="badge bg-secondary">{{ $item->coach_domain->sport->name }}</span></p>
                  <p class="card-text text-secondary">Tanggal : {{ Carbon::parse($item->train_date)->format('d M Y') }}</p>
                  <p class="card-text text-secondary">
                    Waktu : {{ Carbon::parse($item->train_since)->format('H:i') }} -
                    {{ Carbon::parse($item->train_until)->format('H:i') }}
                  </p>
                  <a href={{ 'https://wa.me/62' . substr($item->order->user->phone_number, 1) }}
                    class="btn btn-primary d-inline-block">Kontak</a>

                    @if(Carbon::now()->lt($item->train_date))
                        <a href="{{ route('coach.customer.cancel.view', $item->order_item_status->id) }}" class="btn btn-danger d-inline-block">Batalkan</a>
                    @else
                        <form action={{ route('coach.customer.done', $item->order_item_status->id) }} method="POST"
                            class="d-inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success d-inline-block">Tandai Selesai</button>
                        </form>
                    @endif
                </div>
              </div>
            </div>
          @endforeach
        @endisset

    </div>
  </div>
</section>
@endsection
