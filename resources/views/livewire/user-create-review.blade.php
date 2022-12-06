<div>
    <h1>Ulasan Untuk {{ $order_item->coach_domain->coach->name }}</h1>
    <div class="col-lg-4 col-md-6 col-8">
        <form wire:submit.prevent="createReview">
            @csrf
          <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" class="form-control" id="rating" name="rating" step="1" min="1" max="5" wire:model="rating">
          </div>
          @error('rating')
            <span class="text-danger">{{ $message }}</span>
          @enderror

          <div class="mb-3">
            <label for="description" class="form-label">Isi Ulasan</label>
            <textarea class="form-control" id="description" rows="3" wire:model="description"></textarea>
          </div>
          @error('description')
              <span class="text-danger">{{ $message }}</span>
          @enderror

          <div class="mt-5 text-center">
            <button type="submit" class="btn btn-dark px-4 py-2">Buat</button>
          </div>
        </form>
      </div>
</div>
