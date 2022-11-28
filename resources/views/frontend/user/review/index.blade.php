@extends('frontend.layout.main')

@section('content')
  <section class="reviewPage" id="reviewPage">
    <div class="container">
      <h1 class="section-title mb-5">REVIEWS</h1>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

        @for ($i = 0; $i < 8; $i++)
          <div class="col">
            <div class="review-card">
              <p class="review-rating">4.2</p>
              <p class="review-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni mollitia rem numquam
                fugit odio illo sed totam repudiandae, iusto natus assumenda, sunt vero dicta, tempora maiores facere.
                Voluptas, qui consectetur.</p>
              <p class="review-user">Sambo | March 26, 2022</p>
              <p class="review-coach">Review for Jason</p>
            </div>
          </div>
        @endfor
      </div>
    </div>
  </section>
@endsection
