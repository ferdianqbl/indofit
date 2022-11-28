<nav class="navbar navbar-expand-lg bg-light fixed-top" id="my-navbar">
  <div class="container">
    <a class="navbar-brand" href="/">INDOFIT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-lg-0 ms-lg-auto ms-lg-0 mx-auto text-center mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link{{ Request::is('/') ? ' active' : '' }}" href="/">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ Request::is('trainer') ? ' active' : '' }}" href="#">TRAINER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ Request::is('review') ? ' active' : '' }}" href="#">REVIEW</a>
        </li>
        <li class="nav-item me-0 me-lg-3">
          <a class="nav-link{{ Request::is('about') ? ' active' : '' }}" href="/about">ABOUT</a>
        </li>
        @guest
            <li class="nav-item">
                <a class="nav-link login-btn d-inline-block d-lg-block" href={{ route('user.login.view') }}>LOGIN</a>
            </li>
        @else
            <li class="nav-item">
                <p class="d-inline-block d-lg-block">Hello, {{ Auth::user()->name }}</p>
            </li>

            {{-- Buat logout, pake form ini --}}
            <form action="{{ route('user.logout') }}" method="POST">
                @csrf
            </form>

        @endguest

      </ul>
    </div>
  </div>
</nav>
