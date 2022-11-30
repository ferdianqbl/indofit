@extends('frontend.layout.main')

@section('content')
  <section class="reviewPage" id="reviewPage">
    <div class="container">
      <h1 class="section-title mb-5">REVIEWS</h1>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @if($reviews->isEmpty())
            NO REVIEWS
        @else
            @foreach ($reviews as $review)
                <div class="col">
                    <div class="review-card">
                    <p class="review-rating">{{ $review->rating }}</p>
                    <p class="review-text">{{ $review->description }}</p>
                    <p class="review-user">{{ $review->user->name }} | {{ $review->created_at }}/p>
                    <p class="review-coach">Review for {{ $review->coach->name }}</p>
                    </div>
                </div>
            @endforeach
      </div>
    </div>
  </section>
@endsection
