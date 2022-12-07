@extends('admin.layout')

@php
    use Akaunting\Money\Money;
@endphp

@section('content')
<div class="container">
    <h1 class="text-left">Pelatih</h1>
    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Sports Domain</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($coaches as $c)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $c->name }}</td>
                    <td>
                        @foreach ($c->coach_domains as $domain)
                            <span class="badge text-bg-dark">{{ $domain->sport->name }} - {{ Money::IDR($domain->price, true) }}</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
