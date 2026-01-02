<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'theme_id',
        'minimum_people',
        'base_price',
        'stock',
        'conditions',
    ];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'menu_dish');
    }

    public function diets()
    {
        return $this->belongsToMany(Diet::class, 'menu_diet');
    }

    public function images()
    {
        return $this->hasMany(MenuImage::class);
    }
}
