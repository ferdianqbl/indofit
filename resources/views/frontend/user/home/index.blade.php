@extends('frontend.layout.main')

@section('content')
  <div class="home" id="home">
    <section class="hero" id="hero">
      <div class="container">
        <div class="row justify-content-center align-items-center flex-column-reverse flex-md-row">
          <div class="col-md-6 col-lg-5">
            <h1 class="hero-title">
              HIRE<br>
              YOUR<br>
              TRAINER<br>
              WITH US.
            </h1>
            <p class="hero-text">
              LEVEL UP YOUR SKILLS WITH US
            </p>
            <a href="#" class="btn my-btn-primary">EXPLORE NOW</a>
          </div>
          <div class="col-md-6 col-lg-6 mb-5 mb-md-0">
            <img src="/images/landingPage/home/hero.png" alt="hero-img" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
