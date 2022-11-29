@extends('frontend.layout.main')

@section('content')
<div class="trainerPage" id="trainerPage">


  <section class="trainer-list" id="trainer-list">
    <div class="container">
      <h1 class="section-title mb-5">TRAINER LIST</h1>
      @if (session('message'))
      <div class="alert alert-success alert-dismissible fade show mb-5 text-center" role="alert">
        <h4>{{ session('message') }}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      @endif

      <div class="row row-cols-1 row-cols-md-4 g-4">
        @if ($trainers->count() > 0)
        @foreach ($trainers as $trainer)
        <div class="col">
          <div class="card h-100 trainer-card">
            <img src="/images/landingPage/home/Pelatih-1.png" alt="trainer-img" class="card-img-top img-trainer">
            <div class="card-body">
              <p class="trainer-name">{{ $trainer->coach->name }}</p>
              <p class="trainer-category">{{ $trainer->sport->name }}</p>
              <a href={{ route('user.trainer.detail', $trainer->id) }} class="trainer-link">More</a>
            </div>
          </div>
        </div>
        @endforeach
        @else
        NO TRAINER
        @endisset
      </div>
    </div>
  </section>
</div>
@endsection