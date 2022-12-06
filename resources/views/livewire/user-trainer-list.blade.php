<div>
  <div class="container">
    <h1 class="section-title mb-5">DAFTAR PELATIH</h1>
    @if (session('message'))
      <div class="alert alert-success alert-dismissible fade show mb-5 text-center" role="alert">
        <h4>{{ session('message') }}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div>
      <form>
        <label for="search" class="form-label">Olahraga</label>
        <select name="search" class="form-select" id="search" wire:model="sportSearch">
          <option value="">Pilih</option>
          @foreach ($sports as $sport)
            <option value="{{ $sport->id }}">{{ $sport->name }}</option>
          @endforeach
        </select>

        <label for="name_search" class="form-label">Nama Pelatih</label>
        <input type="text" class="form-control" id="name_search" name="name_search" wire:model="nameSearch">
        {{--
                <label for="date_search">Tanggal Booking</label>
                <input type="date" name="date_search" wire:model="dateSearch" class="form-control"> --}}
      </form>
    </div>

    <div class="row row-cols-1 row-cols-md-4 g-4 mt-5">
      @if ($trainers->count() > 0)
        @foreach ($trainers as $trainer)
          <div class="col">
            <div class="card h-100 trainer-card">
              @if (is_null($trainer->coach->image))
                <img
                  src="https://ui-avatars.com/api/?name={{ str_replace('+', ' ', $trainer->coach->name) }}?background=0D8ABC&color=fff"
                  alt="">
              @else
                <img src="/storage/avatar/{{ $trainer->coach->image }}" alt="trainer-img"
                  class="card-img-top img-trainer">
              @endif
              <div class="card-body">
                <p class="trainer-name">{{ $trainer->coach->name }}</p>
                <p class="trainer-category">{{ $trainer->sport->name }}</p>
                <span class="badge text-bg-dark">{{ $trainer->working_days }}</span>
                <br>
                <a href={{ route('user.trainer.detail', $trainer->id) }} class="trainer-link">Detail</a>
              </div>
            </div>
          </div>
        @endforeach
      @else
        BELUM ADA PELATIH.
      @endisset
  </div>
</div>
