<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(): View
    {
        $user_id = Auth::guard('user')->id();

        $histories = Invoice::whereHas('order', fn($q) => $q->where('user_id', $user_id))->orderBy('created_at', 'DESC')->get();

        $title = 'History';
        return view('frontend.user.history.index', compact('title', 'histories'));
    }
}
