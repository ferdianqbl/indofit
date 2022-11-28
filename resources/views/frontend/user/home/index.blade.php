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
              WITH US
            </h1>
            <p class="hero-text">
              LEVEL UP YOUR SKILLS WITH US.
            </p>
            <a href="#" class="btn my-btn-primary">EXPLORE NOW</a>
          </div>
          <div class="col-md-6 col-lg-6 mb-5 mb-md-0">
            <img src="/images/landingPage/home/hero.png" alt="hero-img" class="img-fluid">
          </div>
        </div>
      </div>
    </section>

    <section class="category" id="category">
      <div class="container">
        <h1 class="section-title">CATEGORIES</h1>
        <ul class="nav-category d-flex flex-wrap justify-content-center align-items-center">
          <li class="nav-category-item">
            <a href="" class="nav-category-item_link">Soccer</a>
          </li>
          <li class="nav-category-item">
            <a href="" class="nav-category-item_link">Basketball</a>
          </li>
          <li class="nav-category-item">
            <a href="" class="nav-category-item_link">Tennis</a>
          </li>
          <li class="nav-category-item">
            <a href="" class="nav-category-item_link">Badminton</a>
          </li>
          <li class="nav-category-item">
            <a href="" class="nav-category-item_link">Yoga</a>
          </li>
        </ul>
      </div>
    </section>
  </div>
@endsection
