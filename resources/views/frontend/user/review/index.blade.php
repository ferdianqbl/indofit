@extends('frontend.layout.main')

@push('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@php
    use Carbon\Carbon;
@endphp

@section('content')
  <section class="reviewPage" id="reviewPage">
    <div class="container">
      <h1 class="section-title mb-5">ULASAN UNTUK BERBAGAI PELATIH</h1>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @if($reviews->isEmpty())
            NO REVIEWS
        @else
            @foreach ($reviews as $review)
                <div class="col">
                    <div class="review-card">
                    <p class="review-rating">
                        @php $rating = $review->rating; @endphp
                        @foreach(range(1,5) as $i)
                            <span class="fa-stack" style="width:1em">
                                <i class="far fa-star fa-stack-1x"></i>
                                @if($rating > 0)
                                    @if($rating >0.5)
                                        <i class="fas fa-star fa-stack-1x"></i>
                                    @else
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    @endif
                                @endif
                                @php $rating--; @endphp
                            </span>
                        @endforeach
                        ({{ $review->rating }})
                    </p>
                    <p class="review-text">{{ $review->description }}</p>
                    <p class="review-user">{{ $review->user->name }} | {{ Carbon::parse($review->created_at)->format('d M Y') }}</p>
                    <p class="review-coach">Ulasan untuk : {{ $review->coach->name }}</p>
                    </div>
                </div>
            @endforeach
        @endif
      </div>
    </div>
  </section>
@endsection
