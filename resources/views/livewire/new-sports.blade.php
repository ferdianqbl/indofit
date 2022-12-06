<div>
    <section class="login" id="login">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4 col-md-6 col-8">
                    @if(session('msg'))
                        <span class="text-danger">{{ session('msg') }}</span>
                    @endif
                  <form wire:submit.prevent="storeNewSport">
                    @csrf
                    <h1 class="form-title text-center mb-3">
                      Olahraga Baru!
                      <span>Buat Kategori Baru.</span>
                    </h1>
                    <div class="mb-3">
                        <label for="sport_id">Kategori</label>
                        <select id="sport_id" name="sport_id" class="form-select" wire:model="sport_id">
                            @foreach($sports as $sport)
                                <option value={{ $sport->id }}>{{ $sport->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('sport_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="mb-3">
                        <label for="working_days">Hari</label>
                        <select id="working_days" name="working_days" class="form-select" wire:model="working_days">
                            @foreach($days as $day)
                                <option value={{ $day }} {{ old('day') == $day ? 'selected' : '' }}>{{ $day }}</option>
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
                                <option value="{{ $hour }}">{{ $hour }}</option>
                            @endforeach
                        </select>
                        @error('working_time_start')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <p>Ketersediaan Waktu Selesai</p>
                        <select class="form-select" aria-label="Train Until" wire:model="working_time_end">
                            <option value="">Pilih</option>
                            @foreach($listHoursUntil as $hour)
                                <option value="{{ $hour }}">{{ $hour }}</option>
                            @endforeach
                        </select>
                        @error('working_time_end')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga per jam</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="price" value={{ old('price') ?? '50000' }} oninput="this.value|=0" min="50000" step="10000" wire:model="price">
                    </div>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="mt-5 text-center">
                      <button type="submit" class="btn btn-dark px-4 py-2">Buat</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
      </section>
</div>
