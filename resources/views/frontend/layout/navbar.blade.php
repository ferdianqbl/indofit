@php
$urlChecker = new \App\Constants\ListURL();

$url = \Request::route() !== null ? \Request::route()->getName() : '123.123';
$currentURL = explode(".", $url);
$currentURL = array_shift($currentURL);
$isUser = $urlChecker->user($currentURL);
$isCoach = $urlChecker->coach($currentURL);
@endphp

@if($isCoach)
<nav class="navbar navbar-expand-lg bg-light fixed-top" id="my-navbar">
  <div class="container">
    <a class="navbar-brand" href="/">INDOFIT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-lg-0 ms-lg-auto ms-lg-0 mx-auto text-center mb-2 mb-lg-0 align-items-center">
        @if (!Auth::guard('coach')->check())
        <li class="nav-item">
          <a class="nav-link login-btn d-inline-block d-lg-block" href={{ route('coach.login.view') }}>LOGIN</a>
        </li>
        @else
        <li class="nav-item dropdown btn btn-dark">
          <a class="nav-link dropdown-toggle text-white text-uppercase" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Halo, {{ Auth::guard('coach')->user()->name }}
          </a>
          <ul class="dropdown-menu bg-dark text-white">

            {{-- COACH --}}
            <li><a class="btn btn-dark d-block text-start" href="{{ route('coach.customer') }}">Pelanggan</a></li>
            <li><a class="btn btn-dark d-block text-start" href="{{ route('coach.history') }}">Riwayat</a></li>
            <li><a class="btn btn-dark d-block text-start" href="{{ route('coach.sports.index') }}">Olahraga Anda</a></li>
            <li><a class="btn btn-dark d-block text-start" href="{{ route('coach.settings.index') }}">Edit Diri</a></li>
            <form action="{{ route('coach.logout') }}" method="POST" class="p-0 m-0 row">
              @csrf
              <button type="submit" class="btn btn-dark text-start col-12">Logout</button>
            </form>
          </ul>
        </li>
        @endif

      </ul>
    </div>
  </div>
</nav>

@elseif($isUser)
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
          <a class="nav-link{{ Route::is('home') ? ' active' : '' }}" href={{ route('home') }}>BERANDA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ Route::is('user.trainer.view') || Route::is('user.trainer.detail') ? ' active' : '' }}"
            href={{ route('user.trainer.view') }}>PELATIH</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ Route::is('user.review.view') ? ' active' : '' }}" href={{ route('user.review.view')
            }}>ULASAN</a>
        </li>
        <li class="nav-item me-0 me-lg-3">
          <a class="nav-link{{ Route::is('about') ? ' active' : '' }}" href={{ route('about') }}>TENTANG</a>
        </li>

        @if (!Auth::guard('user')->check())
        <li class="nav-item">
          <a class="nav-link login-btn d-inline-block d-lg-block" href={{ route('user.login.view') }}>LOGIN</a>
        </li>
        @else
        <li class="nav-item dropdown btn btn-dark">
          <a class="nav-link dropdown-toggle text-white text-uppercase" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Halo, {{ Auth::guard('user')->user()->name }}
          </a>
          <ul class="dropdown-menu bg-dark text-white">

            {{-- USER --}}
            <li><a class="btn btn-dark d-block text-start" href="{{ route('user.history.view') }}">Riwayat</a></li>
            <li><a class="btn btn-dark d-block text-start" href="{{ route('user.review.show') }}">Review Anda</a></li>
            <li><a class="btn btn-dark d-block text-start" href="{{ route('user.cart.view') }}">Keranjang</a></li>
            <li><a class="btn btn-dark d-block text-start" href="{{ route('user.settings.edit') }}">Edit Diri</a></li>
            <li>
              <form action="{{ route('user.logout') }}" method="POST" class="p-0 m-0 row">
                @csrf
                <button type="submit" class="btn btn-dark text-start col-12">Logout</button>
              </form>
            </li>
          </ul>
        </li>
        @endif

      </ul>
    </div>
  </div>
</nav>
@endif
