<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelReason extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_item_status_id',
        'reason'
    ];

    public function order_item_status()
    {
        return $this->belongsTo(OrderItemStatus::class, 'order_item_status_id');
    }
}
