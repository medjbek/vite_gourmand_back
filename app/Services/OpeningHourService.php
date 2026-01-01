<?php

namespace App\Services;

use App\Models\OpeningHour;
use Illuminate\Support\Collection;

class OpeningHourService
{
    public function getAll(): Collection
    {
        return OpeningHour::orderByRaw("
            FIELD(day,
                'Lundi','Mardi','Mercredi',
                'Jeudi','Vendredi','Samedi','Dimanche'
            )
        ")->get();
    }
}
