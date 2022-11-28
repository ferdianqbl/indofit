<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title ?? 'IndoFit' }}</title>
  {{-- Bootstrap --}}
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  {{-- Custom CSS --}}
  <link rel="stylesheet" href="/css/frontend_user.css">
</head>

<body>
  @include('frontend.layout.navbar')
  @yield('content')
  @include('frontend.layout.footer')
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/frontend_user.js"></script>
</body>

</html>
