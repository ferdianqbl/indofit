@extends('frontend.layout.main')

@php
    use Akaunting\Money\Money;
    use Carbon\Carbon;
@endphp

@section('content')
  <section class="customerTrainerPage" id="customerTrainerPage">
    <div class="container">
      <h1 class="section-title text-center">Your Sports Domain</h1>
      <a class="btn btn-primary" href="{{ route('coach.sports.create') }}">New Sports</a>

      <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @if($items->isEmpty())
            No Customer For Now
            <a class="btn btn-primary" href="{{ route('coach.sports.create') }}">New Sports</a>
        @else
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Sport</th>
                  <th scope="col">Working Time</th>
                  <th scope="col">Price</th>
                  <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $item->sport->name }}</td>
                        <td>{{ $item->working_days }} | {{ $item->working_time_start }} - {{ $item->working_time_end }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href={{ route('coach.sports.edit', $item->id) }} class="btn btn-info">Edit</a>
                            <form action={{ route('coach.sports.destroy', $item->id) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif

      </div>
    </div>
  </section>
@endsection
