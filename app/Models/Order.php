<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'menu_id',
        'customer_last_name',
        'customer_first_name',
        'customer_email',
        'customer_phone',
        'address',
        'city',
        'event_at',
        'location',
        'guest_count',
        'status',
        'menu_price',
        'delivery_price',
        'discount',
        'total_price',
        'cancellation_reason',
        'cancellation_contact_method',
    ];

    protected $casts = [
        'event_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @property-read \App\Models\Menu $menu
    */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function statusHistories()
    {
        return $this->hasMany(OrderStatusHistory::class);
    }
}
