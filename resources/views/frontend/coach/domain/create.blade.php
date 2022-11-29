@extends('frontend.layout.main')

@section('content')
  <section class="login" id="login">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-8">
            @if(session('msg'))
                <span class="text-danger">{{ session('msg') }}</span>
            @endif
          <form method="POST" action={{ route('coach.sports.store') }}>
            @csrf
            <h1 class="form-title text-center mb-3">
              New Sports!
              <span>Let's Create New Sports Category.</span>
            </h1>
            <div class="mb-3">
                <label for="sport_id">Category</label>
                <select id="sport_id" name="sport_id" class="form-select">
                    @foreach($sports as $sport)
                        <option value={{ $sport->id }}>{{ $sport->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('sport_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="working_days">Day</label>
                <select id="working_days" name="working_days" class="form-select">
                    @foreach($days as $day)
                        <option value={{ $day }} {{ old('day') == $day ? 'selected' : '' }}>{{ $day }}</option>
                    @endforeach
                </select>
            </div>
            @error('working_days')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="working_time_start">Time Start</label>
                <input type="time" name="working_time_start" value={{ old('working_time_start') }} class="form-control">
            </div>
            @error('working_time_start')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="working_time_end">Time End</label>
                <input type="time" name="working_time_end" value={{ old('working_time_end') }} class="form-control">
            </div>
            @error('working_time_end')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="price" class="form-label">Price per hour</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="price" value={{ old('price') ?? '50000' }} oninput="this.value|=0" min="50000" step="10000">
            </div>
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-5 text-center">
              <button type="submit" class="btn btn-dark px-4 py-2">Create Sport</button>
            </div>
          </form>
        </div>
      </div>
  </section>
@endsection
