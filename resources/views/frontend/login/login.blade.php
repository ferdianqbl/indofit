@extends('frontend.layout.main')

@section('content')
  <section class="login" id="login">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-8">
          <form method="PUT" action="">
            @csrf
            <h1 class="form-title text-center mb-3">
              WELCOME!
              <span>Let's Login.</span>
            </h1>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            <div class="mt-5 text-center">
              <button type="submit" class="btn btn-dark px-4 py-2">Login</button>
            </div>
          </form>

          <div class="mt-5 text-center">
            <p>Don't have an account? <a href="/register" class="text-dark">Register</a></p>
          </div>
        </div>
      </div>
  </section>
@endsection
