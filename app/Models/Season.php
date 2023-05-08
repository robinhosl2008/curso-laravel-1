<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'series_id'];

    public function series(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }

    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class);
    }

    public function numberOfWatchedEpisodes(): int
    {
        return $this->episodes
            ->filter(function($episode) {
                return $episode->has_see == 1;
            })->count();
    }
}
