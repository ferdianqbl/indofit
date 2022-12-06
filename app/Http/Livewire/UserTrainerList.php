<?php

namespace App\Http\Livewire;

use App\Models\CoachDomain;
use App\Models\Sport;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UserTrainerList extends Component
{
    public Collection $trainers;
    public Collection $sports;

    // deps
    public $sportSearch;
    public $nameSearch;
    public $dateSearch;

    public function mount()
    {
        $sport = Session::get('sport');
        if($sport != null)
        {
            $this->sportSearch = $sport;
        }

        $name = Session::get('name');
        if($name != null)
        {
            $this->nameSearch = $name;
        }

        $date = Session::get('date');
        if($date != null)
        {
            $this->dateSearch = $date;
        }
    }

    public function render()
    {
        $this->sports = Sport::all();
        $this->checkSearchValue();

        Session::put('sport', $this->sportSearch);
        Session::put('name', $this->nameSearch);
        Session::put('date', $this->dateSearch);

        return view('livewire.user-trainer-list');
    }

    private function checkSearchValue()
    {
        $this->trainers = CoachDomain::query()
        ->when(($this->sportSearch != null), function($q) {
            return $q->where('sport_id', $this->sportSearch);
        })
        ->when(($this->nameSearch != null), function($q) {
            return $q->withWhereHas('coach', fn($q) => $q->where('name', 'LIKE', '%'.$this->nameSearch.'%'));
        })
        ->when($this->dateSearch != null, function($q) {
            $d = Carbon::parse($this->dateSearch)->format('l');
            return $q->where('working_days', $d);
        })
        ->get();
    }
}
