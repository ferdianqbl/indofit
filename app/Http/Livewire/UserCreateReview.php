<?php

namespace App\Http\Livewire;

use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class UserCreateReview extends Component
{
    use LivewireAlert;

    public OrderItem $order_item;

    //deps
    public $rating;
    public $description;

    public function render()
    {
        return view('livewire.user-create-review');
    }

    public function rules()
    {
        return [
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'description' => ['required', 'min:5', 'max:250'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createReview()
    {
        if(!Auth::guard('user')->check())
        {
            return redirect()->route('user.login.view');
        }

        $data = $this->validate();

        Review::create([
            'rating' => $data['rating'],
            'description' => $data['description'],
            'user_id' => Auth::guard('user')->id(),
            'coach_id' => $this->order_item->coach_domain->coach->id,
            'order_item_id' => $this->order_item->id
        ]);

        $this->flash('success', 'Review telah dibuat', [], route('user.review.view'));
    }
}
