<?php

namespace App\Services;

use App\Models\Theme;
use App\Models\Diet;
use App\Models\Allergen;

class FilterService
{
    public function getThemes()
    {
        return Theme::orderBy('name')->get();
    }

    public function getDiets()
    {
        return Diet::orderBy('name')->get();
    }
}
