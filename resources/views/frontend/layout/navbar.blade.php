<nav class="navbar navbar-expand-lg bg-light fixed-top" id="my-navbar">
  <div class="container">
    <a class="navbar-brand" href="/">INDOFIT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-lg-0 ms-lg-auto ms-lg-0 mx-auto text-center mb-2 mb-lg-0 align-items-center">
        <li class="nav-item">
          <a class="nav-link{{ Route::is('home') ? ' active' : '' }}" href={{ route('home') }}>HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ Route::is('user.trainer.view') || Route::is('user.trainer.detail') ? ' active' : '' }}"
            href={{ route('user.trainer.view') }}>TRAINER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ Route::is('user.review.view') ? ' active' : '' }}"
            href={{ route('user.review.view') }}>REVIEW</a>
        </li>
        <li class="nav-item me-0 me-lg-3">
          <a class="nav-link{{ Route::is('about') ? ' active' : '' }}" href={{ route('about') }}>ABOUT</a>
        </li>
        @if (!Auth::guard('user')->check())
          <li class="nav-item">
            <a class="nav-link login-btn d-inline-block d-lg-block" href={{ route('user.login.view') }}>LOGIN</a>
          </li>
        @else
          <li class="nav-item dropdown btn btn-dark">
            <a class="nav-link dropdown-toggle text-white text-uppercase" href="#" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Hello, {{ Auth::guard('user')->user()->name }}
            </a>
            <ul class="dropdown-menu bg-dark text-white">

              {{-- USER --}}
              <li><a class="btn btn-dark" href="#">History</a></li>
              <li><a class="btn btn-dark" href="#">Cart</a></li>
              <li><a class="btn btn-dark" href="#">Settings</a></li>
              <li><a class="btn btn-dark" href="#">Cart</a></li>

              {{-- COACH --}}
              <li><a class="btn btn-dark" href="#">History</a></li>
              <li><a class="btn btn-dark" href="#">Progress</a></li>
              <li><a class="btn btn-dark" href="#">Offers</a></li>
              {{-- ========== --}}

              <li>
                {{-- Buat logout, pake form ini --}}
                <form action="{{ route('user.logout') }}" method="POST" class="p-0 m-0">
                  @csrf
                  <button type="submit" class="btn btn-dark">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @endif

      </ul>
    </div>
  </div>
</nav>
