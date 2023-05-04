<?php

namespace App\Repository;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class EloquentSerieRepository implements SerieRepository
{
    public function add(SeriesFormRequest $request): Serie
    {
        $serie = DB::transaction(function() use($request) {
            $newSerie = Serie::create($request->all());
        
            $seasons = [];
            for ($i = 1; $i <= $request->seasonsQtd; $i++) {
                $seasons[] = [
                    'number' => $i,
                    'series_id' => $newSerie->id
                ];
            }
            Season::insert($seasons);

            $episodes = [];
            foreach ($newSerie->seasons as $season) {
                for ($x = 1; $x <= $request->episodesQtd; $x++) {
                    $episodes[] = [
                        'number' => $x,
                        'season_id' => $season->id
                    ];
                }
            }
            Episode::insert($episodes);

            return $newSerie;
        }, 5);

        return $serie;
    }
}