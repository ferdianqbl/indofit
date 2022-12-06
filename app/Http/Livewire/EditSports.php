<?php

namespace App\Http\Livewire;

use App\Models\CoachDomain;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Label84\HoursHelper\Facades\HoursHelper;
use Illuminate\Support\Collection as SupportCollection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EditSports extends Component
{
    use LivewireAlert;

    public CoachDomain $domain;
    public Array $days;

    public SupportCollection $listHoursSince;
    public SupportCollection $listHoursUntil;

    // dependensi form
    public $working_days;
    public $working_time_start;
    public $working_time_end;
    public $price;

    public function render()
    {
        if($this->working_days == null)
        {
            $this->working_days = $this->domain->working_days;
        }

        if($this->price == null)
        {
            $this->price = $this->domain->price;
        }

        $this->listHoursSince = HoursHelper::create("01:00", "23:00", 30);
        if($this->working_time_start == null)
        {
            $this->listHoursUntil = HoursHelper::create("01:00", "23:00", 30);
        }

        else
        {
            $util = Carbon::parse($this->working_time_start)->addMinutes(30)->format('H:i');
            $this->listHoursUntil = HoursHelper::create($util, "23:00", 30);
        }

        return view('livewire.edit-sports');
    }

    public function rules()
    {
        return [
            'working_days' => ['required', Rule::in(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'])],
            'working_time_start' => ['required_with:working_time_end'],
            'working_time_end' => ['required_with:working_time_start'],
            'price' => ['required', 'numeric', 'max:1000000']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateSport()
    {
        $data = $this->validate();
        $this->domain->load('sport');

        if(!$this->checkTime($data['working_time_start'], $data['working_time_end']))
        {
            $this->addError('working_time_end', 'Waktu harus lebih besar dari jam mulai');
            $this->addError('working_time_start', 'Waktu harus lebih kecil dari jam selesai');
            return;
        }

        if($data['working_time_start'] != null)
        {
            $this->domain->working_time_start = $data['working_time_start'];
        }

        if($data['working_time_end'] != null)
        {
            $this->domain->working_time_end = $data['working_time_end'];
        }

        if($this->domain->working_days == $data['working_days'])
        {
            $this->domain->price = $data['price'];
            $this->domain->save();
            $this->flash('success', 'Kategori Olahraga Telah Diupdate', [], route('coach.sports.index'));
            return;
        }

        $domains = CoachDomain::with(['sport'])->where('coach_id', Auth::guard('coach')->id())
        ->where('working_days', '!=' , $this->domain->working_days)
        ->get();

        foreach($domains as $d)
        {
            if($d->working_days == $data['working_days'])
            {
                $this->alert('info', "Sudah ada jadwal di hari {$data['working_days']}, pilih hari lain");
                return;
            }
        }

        $this->domain->working_days = $data['working_days'];
        $this->domain->price = $data['price'];

        $this->domain->save();
        $this->flash('success', 'Kategori Olahraga Telah Diupdate', [], route('coach.sports.index'));
    }

    private function checkTime($start, $end)
    {
        if(($start == null) && ($end == null))
        {
            return true;
        }

        $start = intval($start);
        $end = intval($end);

        return $start < $end;
    }
}
