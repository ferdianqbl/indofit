@extends('frontend.layout.main')

@php
    use Carbon\Carbon;
    use App\Constants\Progress;
@endphp

@section('content')
  <section class="customerTrainerPage" id="customerTrainerPage">
    <div class="container">
      <h1 class="section-title text-center">Review Anda</h1>
      <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @if($items->isEmpty())
            Belum ada pesanan yang selesai untuk saat ini. Mari pesan!
        @else
        <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Pelatih</th>
                  <th scope="col">Olahraga</th>
                  <th scope="col">Waktu</th>
                  <th scope="col"></th>
                </tr>
            </thead>
            @foreach($items as $item)
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $item->coach_domain->coach->name }}</td>
                <td>{{ $item->coach_domain->sport->name }}</td>
                <td>{{ Carbon::parse($item->train_date)->format('d M Y') }} | {{ Carbon::parse($item->train_since)->format('H:i') }} - {{ Carbon::parse($item->train_until)->format('H:i') }}</td>
                <td>
                    <a href="{{ route('user.review.create', $item->id) }}" class="btn btn-primary">Buat Review</a>
                </td>
            @endforeach
            <tbody>
            </tbody>
        </table>
        @endif

      </div>
    </div>
  </section>
@endsection
