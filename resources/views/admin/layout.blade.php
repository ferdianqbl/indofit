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
      <span class="logo_name">Indofit</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="{{ route('admin.overview') }}" class="{{ Route::is('admin.overview') ? 'active' : '' }}">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Overview</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.orders') }}" class="{{ Route::is('admin.orders') ? 'active' : '' }}">
            <i class='bx bx-box' ></i>
            <span class="links_name">Orders</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.coach') }}" class="{{ Route::is('admin.coach') ? 'active' : '' }}">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Coach</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.coach_progress') }}" class="{{ Route::is('admin.coach_progress') ? 'active' : '' }}">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Coach Progress</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">@yield('current-section')</span>
      </div>
      <div class="profile-details">
        <img src="{{ asset('admin_template/unknown.png') }}" alt="">
        <span class="admin_name">{{ Auth::guard('admin')->user()->name }}</span>
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
