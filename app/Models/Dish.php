<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
        'is_active',
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_dish');
    }


    public function allergens()
    {
        return $this->belongsToMany(Allergen::class, 'dish_allergen');
    }
}
