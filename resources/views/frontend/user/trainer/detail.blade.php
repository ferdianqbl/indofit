@extends('frontend.layout.main')

@section('content')
  <div class="trainer" id="trainer">
    <p>{{ $trainer->coach->name }}</p>
    <p>{{ $trainer->price }}</p>
    <p>Working time : {{ $trainer->working_time_start }} - {{ $trainer->working_time_end }}</p>
    <p>Star average : {{ number_format($avg_star, 2) }}</p>

    @foreach ($specialities as $s)
        <p>{{ $s->sport->name }}</p>
    @endforeach
  </div>
@endsection
