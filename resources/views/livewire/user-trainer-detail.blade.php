<div>
    <section class="trainer-profile" id="trainer-profile">
        <div class="container">
          <div class="row justify-content-center align-items-center row-cols-1 row-cols-md-2 g-1">
            <div class="col text-center">
              <img src="/storage/avatar/{{ $trainer->coach->image }}" alt="trainer-img" class="img-trainer">
            </div>
            <div class="col">
              <div class="trainer-profile-detail">
                <p class="trainer-name">{{ $trainer->coach->name }}</p>
                <p class="trainer-price">Olahraga : {{ $trainer->sport->name }}</p>
                <p class="trainer-time">Working time : {{ $trainer->working_time_start }} - {{ $trainer->working_time_end }}</p>
                <p class="trainer-price">Price : Rp. {{ $trainer->price }} / hour</p>
                <p class="trainer-star">Star average : {{ $avg_star }}</p>
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
                      <p>Date Booking</p>
                      <input type="date" name="train_date" wire:model="train_date" class="form-control">
                      @error('train_date')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <br>
                    <div>
                      <p>Train Since</p>
                      <input type="time" name="train_since" wire:model="train_since" class="form-control">
                      @error('train_since')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <br>
                    <div>
                      <p>Train Until</p>
                      <input type="time" name="train_until" wire:model="train_until" class="form-control">
                      @error('train_until')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <br>
                    <div>
                        <p>Catatan:</p>
                        <ol>
                            <li>
                                <p>
                                    setiap orang tidak bisa memesan trainer lebih dari 1 sehari (<a href="https://lifestyle.kompas.com/read/2019/10/11/203500020/ini-sebabnya-olahraga-dua-kali-sehari-buruk-untuk-kesehatan?page=all" target="_blank">lihat disini</a>)
                                </p>
                            </li>
                            <li>Jika anda ingin mengganti trainer pada hari yang sama, silakan hapus pesanan nya di keranjang</li>
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
