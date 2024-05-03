<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    use HasFactory;

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'cities_events', 'cities_id', 'events_id');
    }
}
