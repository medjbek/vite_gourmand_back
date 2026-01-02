<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DishAllergen extends Pivot
{
    protected $table = 'dish_allergen';

    public $timestamps = false;

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    public function allergen()
    {
        return $this->belongsTo(Allergen::class);
    }
}
