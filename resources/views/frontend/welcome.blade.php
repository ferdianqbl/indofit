@extends('frontend.layout.main')

@section('content')
<div class="home" id="home">
  <section class="hero" id="hero">
    <div class="container">
      <div class="row justify-content-center align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 col-lg-5">
          <h1 class="hero-title">
            CARI<br>
            PELATIH<br>
            ANDA<br>
            BERSAMA KAMI
          </h1>
          <p class="hero-text">
            NAIKKAN KEMAMPUAN ANDA BERSAMA KAMI!
          </p>
        </div>
        <div class="col-md-6 col-lg-6 mb-5 mb-md-0">
          <img src="/images/landingPage/home/hero.png" alt="hero-img" class="img-fluid img-hero">
        </div>
      </div>
    </div>
  </section>

  <section class="category" id="category">
    <div class="container">
      <h1 class="section-title">KATEGORI</h1>
      <ul class="nav-category d-flex flex-wrap justify-content-center align-items-center">
        <li class="nav-category-item">
          <a href="#" class="nav-category-item_link">Sepakbola</a>
        </li>
        <li class="nav-category-item">
          <a href="#" class="nav-category-item_link">Basket</a>
        </li>
        <li class="nav-category-item">
          <a href="#" class="nav-category-item_link">Tennis</a>
        </li>
        <li class="nav-category-item">
          <a href="#" class="nav-category-item_link">Badminton</a>
        </li>
        <li class="nav-category-item">
          <a href="#" class="nav-category-item_link">Yoga</a>
        </li>
      </ul>
    </div>
  </section>

  <section class="trainer" id="trainer">
    <div class="container">
      <h1 class="section-title mb-5">PELATIH</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100 trainer-card">
            <img src="/images/landingPage/home/Pelatih-1.png" alt="trainer-img" class="card-img-top img-trainer">
            <div class="card-body">
              <p class="trainer-name">Andi Suhaya</p>
              <p class="trainer-category">Yoga</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 trainer-card">
            <img src="/images/landingPage/home/Pelatih-6.jpg" alt="trainer-img" class="card-img-top img-trainer">
            <div class="card-body">
              <p class="trainer-name">Doni Laksana</p>
              <p class="trainer-category">Sepakbola</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 trainer-card">
            <img src="/images/landingPage/home/Pelatih-3.png" alt="trainer-img" class="card-img-top img-trainer">
            <div class="card-body">
              <p class="trainer-name">Tantowi Bagus</p>
              <p class="trainer-category">Badminton</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="review" id="review">
    <div class="container">
      <h1 class="section-title mb-5">Testimoni</h1>
      <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
          <img src="/images/landingPage/home/review.png" alt="review-img" class="img-fluid review-img">
        </div>
        <div class="col-md-6">
          <p class="review-text">
            Sebelum saya mengenal IndoFit, saya sering kesulitan mencari pelatih dengan cepat. Namun semenjak mengenalnya, saya jadi lebih giat berlatih
            dengan pelatih handal. Terimakasih IndoFit.
          </p>
          <p class="review-date">1 Dec, 2022</p>
          <p class="review-name">Alvin Pradatya</p>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
