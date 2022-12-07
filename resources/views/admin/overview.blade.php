@extends('admin.layout')

@section('content')
<div class="container">
    <h1 class="text-left">Statistik</h1>
    <div class="row row-cols-4 text-center">
      <div class="col">
        <div class="card border-dark mb-3" style="max-width: 18rem;">
            <div class="card-body text-dark text-center">
                <h5 class="card-title">Customer</h5>
                <p class="card-text">{{ $invoice->customers }}</p>
            </div>
        </div>
      </div>

      <div class="col">
        <div class="card border-dark mb-3" style="max-width: 18rem;">
            <div class="card-body text-dark text-center">
                <h5 class="card-title">Terbayar</h5>
                <p class="card-text">{{ $invoice->paid }}</p>
            </div>
        </div>
      </div>

      <div class="col">
        <div class="card border-dark mb-3" style="max-width: 18rem;">
            <div class="card-body text-dark text-center">
                <h5 class="card-title">Pending</h5>
                <p class="card-text">{{ $invoice->pending }}</p>
            </div>
        </div>
      </div>

      <div class="col">
        <div class="card border-dark mb-3" style="max-width: 18rem;">
            <div class="card-body text-dark text-center">
                <h5 class="card-title">Gagal</h5>
                <p class="card-text">{{ $invoice->failed }}</p>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
