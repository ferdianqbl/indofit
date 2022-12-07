<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Indofit Admin </title>
    <link rel="stylesheet" href="{{ asset('admin_template/style.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

  {{-- Bootstrap --}}
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  {{-- Custom CSS --}}
  <link rel="stylesheet" href="{{ asset('css/frontend_user.css') }}">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <span class="logo_name">IndoFit</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="{{ route('admin.overview') }}" class="{{ Route::is('admin.overview') ? 'active' : '' }}">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Ringkasan</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.orders') }}" class="{{ Route::is('admin.orders') ? 'active' : '' }}">
            <i class='bx bx-box' ></i>
            <span class="links_name">Order</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.coach') }}" class="{{ Route::is('admin.coach') ? 'active' : '' }}">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Daftar Pelatih</span>
          </a>
        </li>
        <li>
            <a href="{{ route('admin.approved') }}" class="{{ Route::is('admin.coach') ? 'active' : '' }}">
              <i class='bx bx-list-ul' ></i>
              <span class="links_name">Pendaftar Coach</span>
            </a>
          </li>

        <li>
          <a href="{{ route('admin.coach_progress') }}" class="{{ Route::is('admin.coach_progress') ? 'active' : '' }}">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Progress Pelatih</span>
          </a>
        </li>
        <li>
            <a href="{{ route('admin.cancellation') }}" class="{{ Route::is('admin.cancellation') ? 'active' : '' }}">
              <i class='bx bx-bell' ></i>
              <span class="links_name">Refund</span>
            </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav class="navbar navbar-expand-lg bg-light fixed-top" id="my-navbar">
        <div class="container">
          <a class="navbar-brand" href="#">ADMIN</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-lg-0 ms-lg-auto ms-lg-0 mx-auto text-center mb-2 mb-lg-0 align-items-center">
              <li class="nav-item dropdown btn btn-dark">
                <a class="nav-link dropdown-toggle text-white text-uppercase" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  ADMIN
                </a>
                <ul class="dropdown-menu bg-dark text-white">
                  <li>
                    <form action="{{ route('admin.logout') }}" method="POST" class="p-0 m-0 row">
                      @csrf
                      <button type="submit" class="btn btn-dark text-start col-12">Logout</button>
                    </form>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </div>
      </nav>
    <div class="home-content">
        @yield('content')
    </div>
  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
 </script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/frontend_user.js') }}"></script>
</body>
</html>
