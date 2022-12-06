@extends('admin.layout')

@section('content')

@section('content')
<div class="container">
    <h1 class="text-left">Pendaftar Coach</h1>
    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">No. Telepon</th>
              <th scope="col">Description</th>
              <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($coaches as $coach)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $coach->name }}</td>
                    <td>{{ $coach->email }}</td>
                    <td>{{ $coach->phone_number }}</td>
                    <td>{{ $coach->description }}</td>
                    <td>
                        <form action="{{ route('admin.approved.update', $coach->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-warning">Daftarkan</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
