@extends('frontend.layout.main')

@section('content')
  <div class="trainer" id="trainer">
    <section class="trainer-list" id="trainer-list">
      <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          @for ($i = 0; $i < 3; $i++)
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
          @endfor
        </div>
      </div>
    </section>
  </div>
@endsection
