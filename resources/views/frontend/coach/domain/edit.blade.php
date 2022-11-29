@extends('frontend.layout.main')

@php use Carbon\Carbon; @endphp

@section('content')
  <section class="login" id="login">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-8">
            @if(session('msg'))
                <span class="text-danger">{{ session('msg') }}</span>
            @endif
          <form method="POST" action={{ route('coach.sports.update', $domain->id) }}>
            @csrf
            @method('PATCH')
            <h1 class="form-title text-center mb-3">
              Edit Sports!
              <span>Let's Edit.</span>
            </h1>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <input class="form-control" value={{ $domain->sport->name  }} disabled>
            </div>

            <div class="mb-3">
                <label for="working_days">Day</label>
                <select id="working_days" name="working_days" class="form-select">
                    @foreach($days as $day)
                        <option value={{ $day }} {{ old('day') ? 'selected' : ($domain->working_days == $day ? 'selected' : '' ) }}>{{ $day }}</option>
                    @endforeach
                </select>
            </div>
            @error('working_days')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="working_time_start">Time Start</label>
                <input type="time" name="working_time_start" value={{ old('working_time_start') ?? Carbon::parse($domain->working_time_start)->format('H:i') }} class="form-control">
            </div>
            @error('working_time_start')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="working_time_end">Time End</label>
                <input type="time" name="working_time_end" value={{ old('working_time_end') ?? Carbon::parse($domain->working_time_end)->format('H:i') }} class="form-control">
            </div>
            @error('working_time_end')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="price" class="form-label">Price per hour</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="price" value={{ old('price') ?? $domain->price }} oninput="this.value|=0" min="50000" step="10000">
            </div>
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-5 text-center">
              <button type="submit" class="btn btn-dark px-4 py-2">Update</button>
            </div>
          </form>
        </div>
      </div>
  </section>
@endsection
