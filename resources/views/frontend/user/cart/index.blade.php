@extends('frontend.layout.main')

@php
    use Gloudemans\Shoppingcart\Facades\Cart;
@endphp

@section('content')
    @if(session('message'))
        <span class="text-info">{{ session('message') }}</span>
    @endif

  <div class="trainerPage" id="trainerPage">
    <section class="trainer-list" id="trainer-list">
        <div class="container">
            <p>You Have {{ Cart::content()->count() }} item(s)</p>
            @if(Cart::content()->count() > 0)
                <form action={{ route('user.cart.destroy') }} method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Remove all</button>
                </form>

                @foreach ($cart as $c)
                    <p>{{ $c->id }}</p>
                    <p>{{ $c->name }}</p>
                    <p>{{ $c->price }}</p>
                    <p>{{ $c->qty }}</p>
                    <p>Subtotal : {{ $c->total }}</p>
                    <form action={{ route('user.cart.remove', $c->rowId) }} method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary">Delete from cart</button>
                    </form>
                    <br>

                    <p>Total Price: {{ Cart::priceTotal() }}</p>
                @endforeach

            @endisset
        </div>
    </div>
  </section>
</div>
@endsection
