@extends('frontend.layout.main')

@section('content')
    @livewire('new-sports', [
        'sports' => $sports,
        'days' => $days,
    ])

@endsection
