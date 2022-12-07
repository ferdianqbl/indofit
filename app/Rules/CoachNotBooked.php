<?php

namespace App\Rules;

use App\Constants\PaymentStatus;
use App\Constants\Status;
use App\Models\OrderItem;
use Illuminate\Contracts\Validation\Rule;

class CoachNotBooked implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $items = OrderItem::query()
        ->with('order')
        ->whereDate('train_date', '=', $value)
        ->get();

        foreach ($items as $i)
        {
            $status = $i->order->invoice->transaction_status;
            if($status == PaymentStatus::SETTLEMENT->value)
            {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Pelatih ini sudah terbooking pada tanggal tersebut.';
    }
}


// ->with('order', function($query){
//     return $query->with('invoice', fn($q) => $q->where('transaction_status', '!=', PaymentStatus::SETTLEMENT->value));
// })
