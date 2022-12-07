@extends('frontend.layout.main')

@section('content')
<section class="login" id="login">
    <div class="container">
        <h2 class="">Batal</h2>
        <form action="{{ route('coach.customer.cancel', $order_item_status->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <label for="reason" class="form-label">Alasan</label>
            <input type="text" class="form-control" required name="reason">

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</section>
@endsection
