@extends('frontend.layout.main')

@section('content')
  <section class="login" id="login">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-8">
            @error('msg')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          <form method="POST" action="{{ route('admin.login.authenticate') }}">
            @csrf
            <h1 class="form-title text-center mb-3">
              LOGIN ADMIN
              <span>Mari Login.</span>
            </h1>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email">
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="mt-5 text-center">
              <button type="submit" class="btn btn-dark px-4 py-2">Login</button>
            </div>
          </form>
        </div>
      </div>
  </section>
@endsection
