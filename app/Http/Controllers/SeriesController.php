<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use DomainException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        // $series = Serie::select()
        //     ->orderBy('name')
        //     ->get();]

        $series = Serie::all();

        $title = "Séries e Filmes";
        $msgSucesso = $request->session()->get('msgSucesso');
        $request->session()->forget('msgSucesso');

        return view('series.index', compact('series', 'title'))->with('msgSucesso', $msgSucesso);
    }

    public function create()
    {
        return view('series.new-serie', ['name' => '', 'id' => '']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3']
        ]);

        if ($request->id) {
            $serie = Serie::find($request->id);
            $nomeAntigo = $serie->name;
            $serie->name = $request->name;
            $serie->save();
            
            return redirect('/series')->with('msgSucesso', "Série atualizada de '{$nomeAntigo}' para '{$serie->name}'!");
        }

        // $name = $request->name;
        
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
        $serie = Serie::create(['name' => $request->name]);
        // $request->session()->put('msgSucesso', "Série '{$serie->name}' adicionada com sucesso!");
        
        return redirect('/series')->with('msgSucesso', "Série '{$serie->name}' adicionada com sucesso!");
    }

    public function editar(Serie $serie, Request $request)
    {
        return view('series.new-serie', ['name' => $serie->name, 'id' => $serie->id]);
    }

    public function destroy(Serie $serie, Request $request)
    {
        $serie->delete();
        // $request->session()->put('msgSucesso', "Série '{$serie->name}' removida com sucesso!");

        return redirect('/series')->with('msgSucesso', "Série '{$serie->name}' removida com sucesso!");
    }
}
