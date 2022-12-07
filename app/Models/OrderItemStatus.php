<?php

namespace App\Models;

use App\Constants\Progress;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItemStatus extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_item_id',
        'status',
        'cancellation_status',
    ];

    protected $table = 'order_item_statuses';

    protected $casts = ['status' => Progress::class];

    public function order_item(): BelongsTo
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function cancel_reason()
    {
        return $this->hasOne(CancelReason::class);
    }
}
