<?php

namespace App\Models\Mongo;

use MongoDB\Laravel\Eloquent\Model;

class MenuOrderStat extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'menu_order_stats';

    protected $fillable = [
        'menu_id',
        'menu_name',
        'date',
        'orders_count',
        'total_revenue',
    ];
}
