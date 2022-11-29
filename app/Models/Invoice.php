<?php

namespace App\Models;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'issued_at',
        'status'
    ];

    protected $casts = ['status' => Status::class];

    public function getPendingAttribute(): bool
    {
        return $this->status == Status::PENDING;
    }

    public function getPaidAttribute(): bool
    {
        return $this->status == Status::PAID;
    }

    public function getCancelAttribute(): bool
    {
        return $this->status == Status::CANCEL;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
