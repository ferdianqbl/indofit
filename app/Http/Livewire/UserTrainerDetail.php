<?php

namespace App\Http\Livewire;

use App\Models\CoachDomain;
use App\Rules\CoachAvailableDays;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Label84\HoursHelper\Facades\HoursHelper;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\Rule;

class UserTrainerDetail extends Component
{
    use LivewireAlert;

    public CoachDomain $trainer;
    public Array $specialities;
    public float $avg_star;
    public SupportCollection $listHoursSince;
    public SupportCollection $listHoursUntil;

    // dependensi untuk form
    public $train_date;
    public $train_since;
    public $train_until;

    public $currentSince;
    public $currentUntil;

    public function render()
    {
        $coachStart = Carbon::parse($this->trainer->working_time_start)->format('H:i');
        $coachEnd = Carbon::parse($this->trainer->working_time_end)->format('H:i');

        $this->listHoursSince = HoursHelper::create($coachStart, $coachEnd, 30);

        if($this->train_since == null) {
            $this->listHoursUntil = HoursHelper::create($coachStart, $coachEnd, 30);
        } else {
            $util = Carbon::parse($this->train_since)->addMinutes(30)->format('H:i');
            $this->listHoursUntil = HoursHelper::create($util, $coachEnd, 30);
        }

        $this->avg_star = number_format($this->avg_star, 2);
        return view('livewire.user-trainer-detail');
    }

    public function rules()
    {
        return [
            'train_date' => ['required', 'date', 'after_or_equal:today', new CoachAvailableDays($this->trainer->working_days)],
            'train_since' => ['required', Rule::in($this->listHoursSince)],
            'train_until' => ['required', Rule::in($this->listHoursUntil), 'after:train_since'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeToCart()
    {
        if(!Auth::guard('user')->check())
        {
            return redirect()->route('user.login.view');
        }

        $this->validate();

        foreach(Cart::content() as $key => $cart)
        {
            foreach($cart as $index => $value) {
                if($index == "options")
                {
                    foreach($value as $i => $v)
                    {
                        if($i == "train_date")
                        {
                            $d = Carbon::parse($v)->eq($this->train_date);
                            if($d)
                            {
                                $this->alert('info', "Tanggal pilihan sudah ada dalam keranjang, silakan pilih hari lain");
                                return;
                            }
                        }
                    }
                }
            }
        }

        $since = Carbon::parse($this->train_since);
        $until = Carbon::parse($this->train_until);

        // perbedaan dalam menit / 60 ==> dapet hasil dalam jam
        $hours = number_format($until->diffInMinutes($since) / 60, 2);

        $price = $this->trainer->price;

        Cart::add([
            'id' => $this->trainer->id,
            'name' => $this->trainer->coach->name,
            'qty' => $hours,
            'price' => $price,
            'weight' => 0,
            'options' => [
                'train_date' => $this->train_date,
                'train_since' => $this->train_since,
                'train_until' => $this->train_until,
            ],
        ]);

        $this->flash('success', 'Telah ditambahkan ke keranjang', [], '/');
        return;
    }
}
