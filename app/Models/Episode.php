<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['number', 'season_id'];

    public function season()
    {
        $this->belongsTo(Season::class, 'season_id');
    }

    public function scopeWatched(Builder $query)
    {
        $query->where('has_see', 1);
    }
}
