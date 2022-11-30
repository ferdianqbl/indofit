@extends('admin.layout')

@section('content')
<div class="container">
    <h1 class="text-left">Orders</h1>
    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Order ID</th>
              <th scope="col">Price</th>
              <th scope="col">User</th>
              <th scope="col">Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($invoices as $i)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $i->order->id }}</td>
                    <td>{{ $i->order->price }}</td>
                    <td>{{ $i->order->user->name }}</td>
                    <td>{{ $i->status->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
