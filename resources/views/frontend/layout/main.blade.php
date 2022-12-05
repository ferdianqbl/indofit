<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title ?? 'IndoFit' }}</title>

  {{-- Bootstrap --}}
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/dataTables.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  {{-- Custom CSS --}}
  <link rel="stylesheet" href="/css/frontend_user.css">

  @stack('head')

  {{-- Livewire --}}
  @livewireStyles
</head>

<body>
  @include('frontend.layout.navbar')
  @yield('content')
  @include('frontend.layout.footer')
  <script src="/js/jquery.js"></script>
  <script src="/js/dataTables.js"></script>
  <script src="/js/dataTables.bootstrap5.min.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/frontend_user.js"></script>

  @stack('script')


  {{-- Livewire Script --}}
  @livewireScripts

  {{-- Alert --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <x-livewire-alert::scripts />
</body>

</html>
