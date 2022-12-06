<div>
    <section class="trainer-profile" id="trainer-profile">
        <div class="container">
          <div class="row justify-content-center align-items-center row-cols-1 row-cols-md-2 g-1">
            <div class="col text-center">
                @if(is_null($trainer->coach->image))
                    <img src="https://ui-avatars.com/api/?name={{ str_replace('+', ' ', $trainer->coach->name) }}?background=0D8ABC&color=fff" alt="">
                @else
                    <img src="/storage/avatar/{{ $trainer->coach->image }}" alt="trainer-img"
                    class="card-img-top img-trainer">
                @endif
              {{-- <img src="/storage/avatar/{{ $trainer->coach->image }}" alt="trainer-img" class="img-trainer"> --}}
            </div>
            <div class="col">
              <div class="trainer-profile-detail">
                <p class="trainer-name">{{ $trainer->coach->name }}</p>
                <p class="trainer-price">Olahraga : {{ $trainer->sport->name }}</p>
                <p class="trainer-price">Hari : {{ $trainer->working_days }}</p>
                <p class="trainer-time">Waktu : {{ $trainer->working_time_start }} - {{ $trainer->working_time_end }}</p>
                <p class="trainer-price">Harga : {{ \Akaunting\Money\Money::IDR($trainer->price, true) }} / jam</p>
                <p class="trainer-star">Rating rata - rata : {{ $avg_star }}</p>
                @isset($speciacilites)
                    <p>Spesialiasi trainer selain {{ $trainer->sport->name }}</p>
                    @foreach ($specialities as $key => $value)
                        @foreach ($value as $sport)
                            <p class="trainer-category">{{ $sport }}</p>
                        @endforeach
                    @endforeach
                @endif

                <div class="trainer-profile-detail-btn mt-3">
                  <form wire:submit.prevent="storeToCart">
                    @csrf
                    <div>
                      <p>Waktu Booking</p>
                      <input type="date" name="train_date" wire:model="train_date" class="form-control">
                      @error('train_date')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <br>
                    <div>
                        <p>Jam Mulai</p>
                        <select class="form-select" aria-label="Train Since" wire:model="train_since">
                            <option value="">Pilih Train Since</option>
                            @foreach($listHoursSince as $hour)
                                <option value="{{ $hour }}">{{ $hour }}</option>
                            @endforeach
                        </select>
                        @error('train_since')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div>
                        <p>Jam Selesai</p>
                        <select class="form-select" aria-label="Train Until" wire:model="train_until">
                            <option value="">Pilih Train Until</option>
                            @foreach($listHoursUntil as $hour)
                                <option value="{{ $hour }}">{{ $hour }}</option>
                            @endforeach
                        </select>
                        @error('train_until')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- <div>
                      <p>Train Since</p>

                      <input type="time" name="train_since" wire:model="train_since" class="form-control">
                      @error('train_since')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div> --}}
                    {{-- <div>
                      <p>Train Until</p>
                      <input type="time" name="train_until" wire:model="train_until" class="form-control">
                      @error('train_until')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div> --}}
                    <br>
                    <div>
                        <p>Catatan:</p>
                        <ol>
                            <li>
                                <p>
                                    setiap orang tidak bisa memesan trainer lebih dari 1 sehari (<a href="https://lifestyle.kompas.com/read/2019/10/11/203500020/ini-sebabnya-olahraga-dua-kali-sehari-buruk-untuk-kesehatan?page=all" target="_blank">lihat disini</a>)
                                </p>
                            </li>
                            <li>Semua pesanan akan dimasukkan dalam keranjang</li>
                        </ol>
                    </div>

                    <button class="btn my-btn-primary" type="submit">Add to cart</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </section>

      <section class="trainer-description" id="trainer-description">
        <div class="container">
          <h1 class="section-title mt-5 pt-5 text-start">DESCRIPTION</h1>
          <p class="trainer-description-text">{{ $trainer->coach->description }}</p>
        </div>
      </section>
</div>
