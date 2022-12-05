<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use Illuminate\Console\Command;
use App\Constants\PaymentStatus;
use App\Services\MidtransPayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckPaymentStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-payment-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Payment Status Every Minute';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('start checking...');

        $this->checkInvoices();

        return Command::SUCCESS;
    }


    public function checkInvoices()
    {
        $service = new MidtransPayment;
        $invoices = Invoice::with('order')
        ->where('transaction_status', '!=', PaymentStatus::CAPTURE->value)
        ->where('transaction_status', '!=', PaymentStatus::SETTLEMENT->value)
        ->get();

        foreach($invoices as $invoice)
        {
            $status = $service->checkStatus($invoice->order->id);

            try {
                DB::beginTransaction();
                $invoice->transaction_status = $status->transaction_status;
                $invoice->save();
                DB::commit();
                Log::info("invoice id {$invoice->id} [{$status->transaction_status}]");
            } catch (\Exception $e) {
                Log::error($e);
                DB::rollBack();
            }
        }
    }
}
