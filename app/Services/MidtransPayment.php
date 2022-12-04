<?php

namespace App\Services;

use Midtrans\Snap;
use App\Models\User;
use Midtrans\Config;
use App\Models\Order;

class MidtransPayment
{
    private $token;
    public $clientToken;

    public function __construct()
    {
        $this->token = env('MIDTRANS_SERVER_KEY');
        $this->clientToken = env('MIDTRANS_CLIENT_KEY');

        // Set your Merchant Server Key
        Config::$serverKey = $this->token;
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = false;
    }

    public function index(Order $order, User $customer): Array
    {
        $params = array(
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->price,
            ],
            'customer_details' => array(
                'first_name' => $customer->name,
                'email' => $customer->email,
                'phone' => $customer->phone_number,
            ),
        );

        $snapToken = Snap::getSnapToken($params);

        return [$snapToken, $this->clientToken];
    }
}
