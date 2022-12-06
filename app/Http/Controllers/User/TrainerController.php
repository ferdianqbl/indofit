<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use App\Models\CoachDomain;
use App\Models\Review;
use App\Models\Sport;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index(): View
    {
        $title = 'Trainer List';
        $trainers = CoachDomain::with(['coach'])->get();
        return view('frontend.user.trainer.index', compact('title', 'trainers'));
    }

    public function detail(CoachDomain $coach_domains): View
    {
        $trainer = $coach_domains->load(['sport', 'coach']);
        $title = 'Trainer Detail';
        $avg_star = Review::where('coach_id', $coach_domains->coach_id)->avg('rating');

        $specialities = Sport::select('sports.name')
        ->where('sports.id', '!=', $coach_domains->sport->id)
        ->join('coach_domains', 'coach_domains.sport_id', '=', 'sports.id')
        ->join('coaches', 'coaches.id', '=', 'coach_domains.coach_id')
        ->get()
        ->toArray();

        if(is_null($avg_star))
        {
            $avg_star = 0.0;
        }

        return view('frontend.user.trainer.detail', compact('title', 'trainer', 'specialities', 'avg_star'));
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            if($request->get('sport') != null)
            {
                $data = CoachDomain::where('sport_id', $request->get('sport'))->get();
            }
        }

        return json_encode($data);
    }
}
