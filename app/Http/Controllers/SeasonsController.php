<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SeasonsController extends Controller
{
    public function index(Serie $serie)
    {
        $seasons = $serie->seasons->all();

        // dd($seasons[0]->episodes()->watched()->count());
        $title = "Seasons of Series";
        
        return view('seasons.index', compact('seasons', 'title'));
    }
}
