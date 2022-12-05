<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coach;
use App\Models\Order;
use App\Models\Invoice;
use App\Constants\Status;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use AgliPanci\LaravelCase\Query\CaseBuilder;
use App\Models\OrderItemStatus;

class AdminController extends Controller
{
    //TODO
    public function overview()
    {
        $invoice = DB::table('invoices')->selectRaw('
            COUNT(CASE WHEN transaction_status = \'pending\' THEN 1 ELSE NULL END) as "pending",
            COUNT(CASE WHEN transaction_status = \'settlement\' THEN 1 ELSE NULL END) as "paid",
            COUNT(CASE WHEN transaction_status = \'expire\' THEN 1 ELSE NULL END) as "failed",
            (SELECT COUNT(DISTINCT user_id) FROM orders where created_at >= ?) as "customers"
        ', [date('Y-m-d').' 00:00:00'])
        ->where('created_at', '>=', date('Y-m-d').' 00:00:00')->get();

        return view('admin.overview', ['invoice' => $invoice[0]]);
    }

    public function orders()
    {
        $invoices = Invoice::with(['order'])->get();
        return view('admin.orders', compact('invoices'));
    }

    public function coach()
    {
        $coaches = Coach::with(['coach_domains'])->get();
        return view('admin.coach', compact('coaches'));
    }

    public function coach_progress()
    {
        $items = OrderItemStatus::query()
        ->with(['order_item'])
        ->orderBy('updated_at', 'asc')
        ->get();
        return view('admin.coach_progress', compact('items'));
    }
}
