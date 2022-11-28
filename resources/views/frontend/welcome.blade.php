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
          <img src="/images/landingPage/home/hero.png" alt="hero-img" class="img-fluid img-hero">
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

  <section class="trainer" id="trainer">
    <div class="container">
      <h1 class="section-title mb-5">FEATURED TRAINERS</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100 trainer-card">
            <img src="/images/landingPage/home/Pelatih-1.png" alt="trainer-img" class="card-img-top img-trainer">
            <div class="card-body">
              <p class="trainer-name">Lebron James</p>
              <p class="trainer-category">Soccer</p>
              <a href="" class="trainer-link">More</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 trainer-card">
            <img src="/images/landingPage/home/Pelatih-2.png" alt="trainer-img" class="card-img-top img-trainer">
            <div class="card-body">
              <p class="trainer-name">Lebron James</p>
              <p class="trainer-category">Soccer</p>
              <a href="" class="trainer-link">More</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 trainer-card">
            <img src="/images/landingPage/home/Pelatih-3.png" alt="trainer-img" class="card-img-top img-trainer">
            <div class="card-body">
              <p class="trainer-name">Lebron James</p>
              <p class="trainer-category">Soccer</p>
              <a href="" class="trainer-link">More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="review" id="review">
    <div class="container">
      <h1 class="section-title mb-5">REVIEW</h1>
      <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
          <img src="/images/landingPage/home/review.png" alt="review-img" class="img-fluid review-img">
        </div>
        <div class="col-md-6">
          <p class="review-text">
            My name is John Petrus, fondly called Jopet. I’ve always had a competitive spirit from an early age,
            marathon running has always been my passion. However, my results stagnated and i couldn’t break my limit of
            2:30:22, but after getting mentoring from Indofit, I managed to reach my goal. So far my best time is
            2:23:16
          </p>
          <p class="review-date">March 26, 2022</p>
          <p class="review-name">John Mayer</p>
          <p class="review-activity">Marathon Runner</p>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection