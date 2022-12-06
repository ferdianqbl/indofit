@extends('admin.layout')

@section('content')

@section('content')
<div class="container">
    <h1 class="text-left">Refund</h1>
    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Order ID</th>
              <th scope="col">Coach</th>
              <th scope="col">Sport</th>
              <th scope="col">Harga</th>
              <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $item->order_item->id }}</td>
                    <td>{{ $item->order_item->coach_domain->coach->name }}</td>
                    <td>{{ $item->order_item->coach_domain->sport->name }}</td>
                    <td>{{ $item->order_item->price }}</td>
                    <td>
                        <a href="https://dashboard.sandbox.midtrans.com/transactions/{{ $item->order_item->order->invoice->midtrans_transaction_id }}" class="btn btn-secondary" target="_blank">Lakukan</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
