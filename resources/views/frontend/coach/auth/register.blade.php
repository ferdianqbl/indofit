@extends('frontend.layout.main')

@section('content')
  <section class="login" id="login">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-8">
          <form method="POST" action={{ route('coach.register.store') }}>
            @csrf
            <h1 class="form-title text-center mb-3">
              SIGN UP!
              <span>Let's Signup, Coach!.</span>
            </h1>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="name" value={{ old('name') }}>
            </div>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email" value={{ old('email') }}>
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
              <label for="phone_number" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="phone" value={{ old('phone_number') }}>
            </div>
            @error('phone_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') ?? '' }}</textarea>
              </div>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Re-type Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="Re-type Password">
            </div>
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-5 text-center">
              <button type="submit" class="btn btn-dark px-4 py-2">Create Account</button>
            </div>
          </form>

          <div class="mt-5 text-center">
            <p>Already have an account? <a href="{{ route('coach.login.view') }}" class="text-dark">Login</a></p>
          </div>
        </div>
      </div>
  </section>
@endsection
