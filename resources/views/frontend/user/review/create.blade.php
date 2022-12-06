@extends('frontend.layout.main')

@section('content')
<section class="login" id="login">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        @livewire('user-create-review', [
            'order_item' => $order_item
        ])
      </div>
  </section>
@endsection
