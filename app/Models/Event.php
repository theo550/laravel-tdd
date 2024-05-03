<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    public function Cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class, 'cities_events', 'events_id', 'cities_id');
    }
}
