<?php

namespace App\Models;

use App\Models\Order;
use App\Models\CoachDomain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\OrderItemStatus;
use Carbon\Carbon;

class OrderItem extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'order_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'train_date',
        'train_since',
        'train_until',
        'coach_domain_id',
        'order_id',
        'price'
    ];

    protected $hidden = [];

    public function coach_domain(): BelongsTo
    {
        return $this->belongsTo(CoachDomain::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function order_item_status(): HasOne
    {
        return $this->hasOne(OrderItemStatus::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    public function orderItemName(): string
    {
        $coachName = $this->coach_domain->coach->name;
        $sportName = $this->coach_domain->sport->name;
        $since = Carbon::parse($this->train_since)->format('H:i');
        $until = Carbon::parse($this->train_until)->format('H:i');

        return $coachName . " -- " . $sportName . " -- " . $since . "-" . $until;
    }
}
