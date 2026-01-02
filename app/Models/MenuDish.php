<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuDish extends Pivot
{
    protected $table = 'menu_dish';

    public $timestamps = false;

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}
