@php use Carbon\Carbon; @endphp

<div>
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-8">
            @if(session('msg'))
                <span class="text-danger">{{ session('msg') }}</span>
            @endif
          <form wire:submit.prevent="updateSport">
            @csrf
            @method('PATCH')
            <h1 class="form-title text-center mb-3">
              Edit!
              <span>Edit Olahraga Anda</span>
            </h1>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input class="form-control" value={{ $domain->sport->name  }} disabled>
            </div>

            <div class="mb-3">
                <label for="working_days">Hari</label>
                <select id="working_days" name="working_days" class="form-select" wire:model="working_days">
                    @foreach($days as $day)
                        <option value={{ $day }}>{{ $day }}</option>
                    @endforeach
                </select>
            </div>
            @error('working_days')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <p>Ketersediaan Waktu Mulai</p>
                <select class="form-select" aria-label="Train Since" wire:model="working_time_start">
                    <option value="">Pilih</option>
                    @foreach($listHoursSince as $hour)
                        <option value="{{ $hour }}" wire:key="start-{{ $hour }}">{{ $hour }}</option>
                    @endforeach
                </select>
                <div class="form-text">Sebelumnya : {{ $domain->working_time_start }}</div>
                @error('working_time_start')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <p>Ketersediaan Waktu Selesai</p>
                <select class="form-select" aria-label="Train Until" wire:model="working_time_end">
                    <option value="">Pilih</option>
                    @foreach($listHoursUntil as $hour)
                        <option value="{{ $hour }}" wires="end-{{ $hour }}">{{ $hour }}</option>
                    @endforeach
                </select>
                <div class="form-text">Sebelumnya : {{ $domain->working_time_end }}</div>
                @error('working_time_end')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga per jam</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="price" min="50000" step="10000" wire:model="price">
            </div>
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-5 text-center">
              <button type="submit" class="btn btn-dark px-4 py-2">Perbarui</button>
            </div>
          </form>
        </div>
    </div>
</div>
