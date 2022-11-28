@extends('frontend.layout.main')

@section('content')
  <div class="detail-trainer" id="detail-trainer">
    <section class="trainer-profile" id="trainer-profile">
      <div class="container">
        <div class="row justify-content-center align-items-center row-cols-1 row-cols-md-2 g-1">
          <div class="col text-center">
            <img src="/images/landingPage/home/Pelatih-1.png" alt="trainer-img" class="img-trainer">
          </div>
          <div class="col">
            <div class="trainer-profile-detail">
              <p class="trainer-name">{{ $trainer->coach->name }}</p>
              <p class="trainer-time">Working time : {{ $trainer->working_time_start }} - {{ $trainer->working_time_end }}
              </p>
              <p class="trainer-price">Price : Rp. {{ $trainer->price }}</p>
              <p class="trainer-star">Star average : {{ number_format($avg_star, 2) }}</p>
              @foreach ($specialities as $s)
                <p class="trainer-category">{{ $s->sport->name }}</p>
              @endforeach

              <div class="trainer-profile-detail-btn mt-3">
                <a href="" class="btn my-btn-primary">Add to Cart</a>
                <a href="" class="btn my-btn-secondary">Contact</a>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section class="trainer-description" id="trainer-description">
      <div class="container">
        <h1 class="section-title mt-5 pt-5 text-start">DESCRIPTION</h1>
        <p class="trainer-description-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt unde, rerum
          dolores odit fugiat asperiores quam qui veniam esse repudiandae adipisci nihil perferendis sequi distinctio,
          maxime quos eligendi? Reprehenderit quo totam ab voluptates hic consequuntur fugit omnis accusamus numquam, ad
          adipisci sed veritatis architecto nesciunt quis non dolorem voluptatem porro doloribus nobis nisi rem possimus
          aut odio! Dolorem debitis magnam repudiandae earum, numquam voluptatem autem quaerat, amet aliquam error totam
          rem deleniti suscipit fugit hic et sunt quidem ipsum quisquam libero. Totam rerum cumque sapiente maiores
          aspernatur ipsa. Perferendis quam aliquam illo inventore expedita doloribus, voluptatem aliquid modi minima
          delectus.</p>
      </div>
    </section>
  </div>
@endsection
