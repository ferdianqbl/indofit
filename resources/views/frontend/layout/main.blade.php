<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  {{-- Bootstrap --}}
  <link rel="stylesheet" href="/css/bootstrap.css">
  {{-- Custom CSS --}}
  <link rel="stylesheet" href="/css/frontend_user.css">
</head>

<body>
  @include('frontend.layout.navbar')
  @yield('content')
  @include('frontend.layout.footer')
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>
