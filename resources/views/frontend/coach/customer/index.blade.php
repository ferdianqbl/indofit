@extends('frontend.layout.main')

@section('content')
  <div class="trainerPage" id="trainerPage">
    <section class="trainer-list" id="trainer-list">
      <div class="container">
            @foreach ($items as $item)
                <p>Latihan tanggal : {{ $item->train_date }}</p>
                <p>Latihan dari jam : {{ $item->train_since }} - {{ $item->train_until }}</p>
                <p>Pemesan : {{ $item->order->user->name }}</p>
                <p>Harga: {{ $item->order->price }}</p>
                <p></p>
                <br>
            @endforeach
      </div>
    </section>
  </div>
@endsection
