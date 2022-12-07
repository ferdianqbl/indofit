@extends('admin.layout')

@php
    use Akaunting\Money\Money;
@endphp

@section('content')
<div class="container">
    <h1 class="text-left">Progress Pelatih</h1>
    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Order ID</th>
              <th scope="col">Pelatih</th>
              <th scope="col">Olahraga</th>
              <th scope="col">Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $item->order_item->id }}</td>
                    <td>{{ $item->order_item->coach_domain->coach->name }}</td>
                    <td>{{ $item->order_item->coach_domain->sport->name }}</td>
                    <td>{{ $item->status->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
