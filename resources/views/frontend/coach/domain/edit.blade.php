@extends('frontend.layout.main')

@section('content')
  <section class="login" id="login">
    <div class="container">
        @livewire('edit-sports', [
            'domain' => $domain,
            'days' => $days,
        ])
  </section>
@endsection
