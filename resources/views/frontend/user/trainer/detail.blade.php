@extends('frontend.layout.main')

@section('content')
  <div class="detail-trainer" id="detail-trainer">
    @livewire('user-trainer-detail', [
        'trainer' => $trainer,
        'avg_star' => $avg_star,
        'specialities' => $specialities
    ])
  </div>
@endsection
