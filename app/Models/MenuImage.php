<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'path',
    ];

    protected $appends = ['url'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->path);
    }
}
