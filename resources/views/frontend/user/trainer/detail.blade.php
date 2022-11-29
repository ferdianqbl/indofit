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
              <p class="trainer-price">Price : Rp. {{ $trainer->price }} / hour</p>
              <p class="trainer-star">Star average : {{ number_format($avg_star, 2) }}</p>
              @foreach ($specialities as $s)
                <p class="trainer-category">{{ $s->sport->name }}</p>
              @endforeach

              <div class="trainer-profile-detail-btn mt-3">
                <form action="{{ route('user.cart.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="coach_domain_id" value={{ $trainer->id }}>
                  @error('coach_domain_id')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror

                  <div>
                    <p>Date Booking</p>
                    <input type="date" name="train_date" value={{ old('train_date') }}>
                    @error('train_date')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <br>
                  <div>
                    <p>Train Since</p>
                    <input type="time" name="train_since" value={{ old('train_since') }}>
                    @error('train_since')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <br>
                  <div>
                    <p>Train Until</p>
                    <input type="time" name="train_until" value={{ old('train_until') }}>
                    @error('train_until')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <br>
                  <div>
                    <p>Book as fast as possible. When someone books this trainer in some day, other user can't order that
                      trainer in the same day (Susah anjir kalo jam nya harus diperiksa juga. Mending kalo di hari itu dah
                      ada yg booking, tu coach baru bisa dipesen lagi besoknya (●'◡'●))</p>
                  </div>

                  <button class="btn my-btn-primary">Add to cart</button>
                  <a href="" class="btn my-btn-secondary">Contact</a>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section class="trainer-description" id="trainer-description">
      <div class="container">
        <h1 class="section-title mt-5 pt-5 text-start">DESCRIPTION</h1>
        <p class="trainer-description-text">{{ $trainer->coach->description }}</p>
      </div>
    </section>
  </div>
@endsection
