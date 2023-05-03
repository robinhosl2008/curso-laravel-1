<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function seasons()
    {
        /**  
         * Uma série pode ou não ter uma ou n temporadas.
         */
        return $this->hasMany(Season::class, 'series_id');
    }

    /**  
     * Configurando uma visualização personalizada ordenando por nome de forma ascendente.
     * Esse método é executado toda vez que o model é utilizado.
     */
    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $queryBuilder) {
            $queryBuilder->orderBy('name', 'asc');
        });
    }

    /**
     * Posso adicionar novos escopos ao meu query builder para compor os escopos globais.
     * Acessamos com $request->active() e ele retorna o resultado já com a condição que queremos.
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('active', true);
    }
}