@extends('frontend.layout.main')

@section('content')
  <section class="login" id="login">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-8">
          <form method="PUT" action="">
            @csrf
            <h1 class="form-title text-center mb-3">
              SIGN UP!
              <span>Let's Signup.</span>
            </h1>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="phone">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            <div class="mb-3">
              <label for="confirmPassword" class="form-label">Re-type Password</label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                placeholder="Re-type Password">
            </div>
            <div class="mt-5 text-center">
              <button type="submit" class="btn btn-dark px-4 py-2">Create Account</button>
            </div>
          </form>

          <div class="mt-5 text-center">
            <p>Don't have an account? <a href="/login" class="text-dark">Login</a></p>
          </div>
        </div>
      </div>
  </section>
@endsection
