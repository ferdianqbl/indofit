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
use App\Constants\Progress;
use App\Mail\CoachCancelMail;
use App\Mail\CoachApprovedMail;
use App\Mail\CoachCancelSchedule;
use App\Models\CancelReason;
use App\Models\OrderItemStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $coaches = Coach::with(['coach_domains'])->where('is_approve', 1)->get();
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

    public function cancellation()
    {
        $items = OrderItemStatus::query()
        ->with(['order_item', 'cancel_reason'])
        ->where('status', Progress::CANCELED->value)
        ->orderBy('updated_at', 'desc')
        ->get();

        return view('admin.cancellation', compact('items'));
    }

    public function cancellationDone(OrderItemStatus $order_item_status)
    {
        $order_item_status->cancellation_status = 0;
        $order_item_status->save();

        Mail::to($order_item_status->order_item->order->user->email)->send(new CoachCancelSchedule($order_item_status));

        return redirect()->action([AdminController::class, 'cancellation']);
    }

    public function approvedCoach()
    {
        $coaches = Coach::where('is_approve', 0)->get();
        return view('admin.approved-coach', compact('coaches'));
    }

    public function setApprovedCoach(Coach $coach)
    {
        $coach->is_approve = 1;
        $coach->save();
        Mail::to($coach->email)->send(new CoachApprovedMail($coach));
        return redirect()->action([AdminController::class, 'approvedCoach']);
    }

    public function denyCoach(Request $request, Coach $coach)
    {
        $reason = $request->get('reason');
        if($reason == '')
        {
            return redirect()->back();
        }

        $coach->delete();

        $email = $coach->email;

        Mail::to($email)->send(new CoachCancelMail($coach, $reason));

        return redirect()->action([AdminController::class, 'approvedCoach']);
    }
}
