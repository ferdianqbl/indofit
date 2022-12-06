<?php

namespace App\Http\Livewire;

use App\Models\CoachDomain;
use App\Models\Sport;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class UserTrainerList extends Component
{
    public Collection $trainers;
    public Collection $sports;

    // deps
    public $sportSearch;
    public $nameSearch;
    public $dateSearch;

    public function render()
    {
        $this->sports = Sport::all();

        $this->checkSearchValue();

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

        // if($this->sportSearch == null && $this->nameSearch == null)
        // {
        //     $this->trainers = CoachDomain::with(['coach'])->get();
        // }

        // if($this->sportSearch != null && $this->nameSearch == null)
        // {
        //     $this->trainers = CoachDomain::with(['coach'])->where('sport_id', $this->sportSearch)->get();
        // }

        // if($this->sportSearch == null && $this->nameSearch != null)
        // {
        //     $this->trainers = CoachDomain::query()
        //     ->withWhereHas('coach', fn($q) => $q->where('name', 'LIKE', '%'.$this->nameSearch.'%'))
        //     ->get();
        // }

        // if($this->sportSearch != null && $this->nameSearch != null)
        // {
        //     $this->trainers = CoachDomain::query()
        //     ->with(['coach', fn($q) => $q->where('name', 'LIKE', '%'.$this->nameSearch.'%') ])
        //     ->where('sport_id', $this->sportSearch)
        //     ->get();
        // }
    }
}
