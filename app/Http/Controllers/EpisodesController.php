<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        $episodes = $season->episodes->all();
        $title = "Episódios";
        $msg = session('msg');
        
        return view('episodes.index', compact('episodes', 'title', 'msg'));
    }

    public function check(Episode $episode, Request $request)
    {
        if ($episode->has_see === 0) { 
            $episode->has_see = 1;
            $episode->save();
        }

        $title = "Episódios";        
        $episodes = $this->getEpisodes($episode);
        $request->session()->put('msg', "Episódio marcado como visto com sucesso!");
        return redirect("/series/season/{$episode->season_id}/episodes")->with('episodes', 'title');
    }

    public function getEpisodes(Episode $episode)
    {
        return Episode::query()->where('season_id', $episode->season_id)->get();
    }
}
