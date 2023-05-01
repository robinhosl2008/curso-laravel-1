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
        $name = $request->name;
        
        // $serie = new Serie();
        // $serie->name = $name;
        // $serie->save();

        /**
         * Usando a propriedade 'mass assignment (atribuição em massa)' deve 
         * adicionar ao model a linha 'private $fillable = ['name'];'. Passamos 
         * um array para a variável com o nome dos campos que ele deverá aceitar. 
         * 
         * Nesse caso, poderia estar usando essa propriedade passando por
         * parâmetro '$request->all()'. Como não considero tão verboso para
         * que outros desenvolvedores possam dar manutenção decidi deixar dessa
         * forma como abaixo. Passando cada valor. Dessa forma acredito que
         * não será necessário ir até a model e ver o que está recebendo.
         * O valor passado deve ser um array.
         * 
         * Existem também o '$request->only(['name', [...])' e outros. Olhe a
         * documentação para mais.
         */
        Serie::create(['name' => $name]);
        
        return redirect('/series');
    }
}
