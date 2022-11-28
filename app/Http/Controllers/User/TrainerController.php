<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use App\Models\CoachDomain;
use App\Models\Review;
use Illuminate\Contracts\View\View;

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
        $trainer = $coach_domains;
        $title = 'Trainer Detail';
        $avg_star = Review::where('coach_id', $coach_domains->coach_id)->avg('rating');
        $specialities = CoachDomain::select('sport_id')->where('coach_id', $coach_domains->coach_id)->distinct()->get();

        return view('frontend.user.trainer.detail', compact('title', 'trainer', 'specialities', 'avg_star'));
    }
}
