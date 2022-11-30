@extends('frontend.layout.main')

@section('content')
  <section class="login" id="login">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-8">
          <form method="POST" action={{ route('coach.settings.update') }}>
            @csrf
            @method('PATCH')
            <h1 class="form-title text-center mb-3">
              Edit!
              <span>What'd you want to edit?</span>
            </h1>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="name" value={{ old('name') ?? $user->name }}>
            </div>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email" value={{ old('email') ?? $user->email }} disabled>
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
              <label for="phone_number" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="phone" value={{ old('phone_number') ?? $user->phone_number }}>
            </div>
            @error('phone_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="description">{{old('description')??$user->description}}</textarea>
              </div>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-5 text-center">
              <button type="submit" class="btn btn-dark px-4 py-2">Update</button>
            </div>
          </form>
        </div>
      </div>
  </section>
@endsection