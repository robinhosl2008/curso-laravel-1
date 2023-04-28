<?php

namespace App\Http\Controllers;

use App\View\Components\Form\Input;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeriesController extends Controller
{
    public function index(): View
    {
        $series = [
            'Série 1',
            'Série 2',
            'Série 3',
            'Série 4',
            'Série 5'
        ];

        $title = "Séries e Filmes";

        return view('series.index', compact('series', 'title'));
    }

    public function create(): View
    {
        return view('series.new-serie');
    }
}
