<?php

namespace App\Http\Controllers\Coach;

use Carbon\Carbon;
use App\Models\Sport;
use App\Models\CoachDomain;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CoachDomainInsertRequest;
use App\Http\Requests\CoachDomainUpdateRequest;

class DomainController extends Controller
{
    public static $listDays = [
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu', 'Minggu'];

    public function index()
    {
        $title = "Coach Domain";
        $items = CoachDomain::where('coach_id', Auth::guard('coach')->id())->get();
        return view('frontend.coach.domain.index', compact('items', 'title'));
    }

    public function create()
    {
        $domains = CoachDomain::where('coach_id', Auth::guard('coach')->id())
        ->get(['working_days','working_time_start','working_time_end']);

        $days = self::$listDays;

        // foreach ($domains as $domain)
        // {
        //     if(in_array($domain->working_days, self::$listDays))
        //     {
        //         $days[] = $domain->working_days;
        //     }
        // }

        // $days = array_diff(self::$listDays, $days);

        $sports = Sport::with('coach_domains')->get();
        $title = "New Sports Domain";

        if($domains->empty())
        {
            return view('frontend.coach.domain.create', compact('sports', 'title', 'days'));
        }
    }


    public function store(CoachDomainInsertRequest $request)
    {
        $data = $request->validated();
        $data['coach_id'] = Auth::guard('coach')->id();

        $domains = CoachDomain::where('coach_id', Auth::guard('coach')->id())
        ->get();

        if($domains->isEmpty())
        {
            CoachDomain::create($data);
            return redirect()->route('coach.sports.index');
        }

        foreach ($domains as $domain)
        {
            if($domain->working_days == $data['working_days'])
            {
                if(($domain->sport_id == $data['sport_id']))
                {
                    return redirect()->back()->with('msg', $domain->sport->name . " is already defined in " . $data['working_days'] . ". Edit that day instead.");
                }

                $domain_start = intval(Carbon::parse($domain->working_time_start)->format('Hi'));
                $domain_end = intval(Carbon::parse($domain->working_time_end)->format('H:i'));

                $input_start = intval(Carbon::parse($data['working_time_start'])->format('Hi'));
                $input_end = intval(Carbon::parse($data['working_time_end'])->format('Hi'));

                if(($input_start > $domain_start && $input_start < $domain_end) && ($input_end > $domain_start && $input_end < $domain_end))
                {
                    CoachDomain::create($data);
                    return redirect()->route('coach.sports.index');
                }
            }
        }

        return redirect()->back()->with('msg', 'There is collision on your schedule at that time. Please choose another day/time');
    }

    public function edit(CoachDomain $sport)
    {
        $title = "Edit Sports";
        return view('frontend.coach.domain.edit', ['title' => $title, 'domain' => $sport, 'days' => self::$listDays]);
    }


    public function update(CoachDomainUpdateRequest $request, CoachDomain $sport)
    {
        $data = $request->validated();
        $data['coach_id'] = Auth::guard('coach')->id();

        $coachDomain = $sport;

        $domains = CoachDomain::with(['sport'])->where('coach_id', Auth::guard('coach')->id())
        ->where('id', $coachDomain)
        ->get();

        if($domains->isEmpty())
        {
            $coachDomain->update($data);
            return redirect()->route('coach.sports.index');
        }

        foreach ($domains as $domain)
        {
            if(($domain->id == $coachDomain->id) && ($domain->sport_id == $coachDomain->sport_id))
            {
                continue;
            }

            else if($domain->working_days == $data['working_days'])
            {
                if(($domain->sport_id == $coachDomain->sport_id))
                {
                    return redirect()->back()->with('msg', "this sport already book in another day");
                }

                $domain_start = intval(Carbon::parse($domain->working_time_start)->format('Hi'));
                $domain_end = intval(Carbon::parse($domain->working_time_end)->format('H:i'));

                $input_start = intval(Carbon::parse($data['working_time_start'])->format('Hi'));
                $input_end = intval(Carbon::parse($data['working_time_end'])->format('Hi'));

                if(($input_start > $domain_start && $input_start < $domain_end) && ($input_end > $domain_start && $input_end < $domain_end))
                {
                    $coachDomain->update($data);
                    return redirect()->route('coach.sports.index');
                }
            }

            else
            {
                if($domain->sport_id == $coachDomain->sport_id)
                {
                    return redirect()->back()->with('msg', 'booked');
                }
            }
        }

        return redirect()->back()->with('msg', 'There is collision on your schedule at that time. Please choose another day/time');
    }


    public function destroy(CoachDomain $sport)
    {
        $sport->delete();
        return redirect()->route('coach.sports.index');
    }
}
