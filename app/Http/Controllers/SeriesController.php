<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use DomainException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::all();

        $title = "Séries e Filmes";

        return view('series.index', compact('series', 'title'));
    }

    public function create()
    {
        return view('series.new-serie');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        
        $serie = new Serie();
        $serie->name = $name;
        $serie->save();
        
        return redirect('/series');
    }
}
