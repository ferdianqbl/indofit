<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use App\Models\CoachDomain;
use Illuminate\Contracts\View\View;

class TrainerController extends Controller
{
    public function index(): View
    {
        $title = 'Trainer List';
        $trainers = CoachDomain::with(['coach'])->get();
        return view('frontend.user.trainer.index', compact('title', 'trainers'));
    }
}
