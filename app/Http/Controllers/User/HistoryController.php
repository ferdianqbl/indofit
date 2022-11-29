<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(): View
    {
        $user_id = Auth::guard('user')->id();

        $histories = Order::where('user_id', $user_id)->get();
        $title = 'History';
        return view('frontend.user.history.index', compact('title', 'histories'));
    }
}
