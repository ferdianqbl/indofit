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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Gagalkan
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Gagalkan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('admin.approved.deny', $coach->id) }}" method="POST">
                                    @csrf
                                    <label for="reason" class="form-label">Alasan</label>
                                    <input type="text" name="reason" required class="form-control">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                                </div>

                            </div>
                            </div>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
