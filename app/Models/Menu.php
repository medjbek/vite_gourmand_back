<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class, 'menu_dish');
    }

    public function diets(): BelongsToMany
    {
        return $this->belongsToMany(Diet::class, 'menu_diet');
    }

    public function images(): HasMany
    {
        return $this->hasMany(MenuImage::class);
    }
}
